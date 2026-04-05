<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentsController extends Controller
{
    public function index()
    {
        $pending = Payment::with(['parentUser', 'child', 'application'])
            ->pending()
            ->latest()
            ->paginate(20);

        $stats = [
            'pending_count'    => Payment::pending()->count(),
            'verified_month'   => Payment::verified()->where('month_year', now()->format('Y-m'))->count(),
            'collected_month'  => Payment::verified()->where('month_year', now()->format('Y-m'))->sum('amount'),
            'total_outstanding'=> $this->totalOutstandingAmount(),
        ];

        return view('admin.payments.index', compact('pending', 'stats'));
    }

    public function verify(Request $request, Payment $payment)
    {
        if ($payment->status !== 'pending') {
            return redirect()->back()->with('error', 'This payment has already been actioned.');
        }

        $request->validate(['admin_note' => 'nullable|string|max:500']);

        $payment->update([
            'status'      => 'verified',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'admin_note'  => $request->admin_note,
        ]);

        $childName = $payment->child?->name ?? $payment->application?->child_name ?? 'Child';

        return redirect()->back()->with('success',
            'Payment of R' . number_format($payment->amount, 2) . ' for ' . $childName . ' verified.'
        );
    }

    public function reject(Request $request, Payment $payment)
    {
        if ($payment->status !== 'pending') {
            return redirect()->back()->with('error', 'This payment has already been actioned.');
        }

        $request->validate(['admin_note' => 'required|string|max:500']);

        $payment->update([
            'status'      => 'rejected',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'admin_note'  => $request->admin_note,
        ]);

        return redirect()->back()->with('success', 'Payment rejected. Reason recorded.');
    }

    public function outstanding()
    {
        $currentMonth = now()->format('Y-m');

        // All approved applications
        $apps = Application::with('child', 'parentUser')
            ->where('status', 'approved')
            ->get();

        // Which child_ids have a verified payment this month
        $paidChildIds = Payment::verified()
            ->where('month_year', $currentMonth)
            ->pluck('child_id')
            ->filter()
            ->unique();

        $allOutstanding = $apps->filter(fn($app) =>
            ! $app->child_id || ! $paidChildIds->contains($app->child_id)
        )->map(function ($app) {
            $baseFee = match ($app->fee_option) {
                'half-day', 'Half Day' => 3800,
                default                => 4200,
            };
            return [
                'child_name'   => $app->child_name,
                'child_number' => $app->child?->child_number ?? $app->reference,
                'parent_name'  => $app->parentUser?->name ?? $app->mother_name,
                'parent_email' => $app->parentUser?->email ?? $app->mother_email,
                'fee'          => $baseFee + ($app->snack_box ? 400 : 0),
            ];
        })->values();

        $totalOutstanding = $allOutstanding->sum('fee');

        $perPage  = 20;
        $page     = request()->get('page', 1);
        $outstanding = new \Illuminate\Pagination\LengthAwarePaginator(
            $allOutstanding->forPage($page, $perPage),
            $allOutstanding->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.payments.outstanding', compact('outstanding', 'currentMonth', 'totalOutstanding'));
    }

    public function statements()
    {
        $payments = Payment::with(['parentUser', 'child', 'application', 'verifiedBy'])
            ->verified()
            ->orderByDesc('payment_date')
            ->paginate(20);

        $totalVerified = Payment::verified()->sum('amount');

        return view('admin.payments.statements', compact('payments', 'totalVerified'));
    }

    public function record(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'amount'         => 'required|numeric|min:1',
            'payment_date'   => 'required|date',
            'reference'      => 'required|string|max:100',
            'admin_note'     => 'nullable|string|max:500',
        ]);

        $app = Application::findOrFail($request->application_id);

        Payment::create([
            'parent_user_id' => $app->parent_user_id,
            'child_id'       => $app->child_id,
            'application_id' => $app->id,
            'amount'         => $request->amount,
            'payment_date'   => $request->payment_date,
            'reference'      => $request->reference,
            'month_year'     => \Carbon\Carbon::parse($request->payment_date)->format('Y-m'),
            'pop_path'       => '',   // admin-recorded, no POP file
            'status'         => 'verified',
            'verified_by'    => Auth::id(),
            'verified_at'    => now(),
            'admin_note'     => $request->admin_note,
        ]);

        return redirect()->route('admin.payments.index')->with('success', 'Payment recorded and verified.');
    }

    /**
     * Stream the proof-of-payment file inline (opens in browser tab).
     * Works without the public/storage symlink.
     */
    public function viewPop(Payment $payment)
    {
        if (! $payment->pop_path || ! Storage::disk('public')->exists($payment->pop_path)) {
            abort(404, 'Proof of payment file not found.');
        }

        $mime = Storage::disk('public')->mimeType($payment->pop_path);
        $filename = basename($payment->pop_path);

        return response()->stream(
            fn () => fpassthru(Storage::disk('public')->readStream($payment->pop_path)),
            200,
            [
                'Content-Type'        => $mime,
                'Content-Disposition' => "inline; filename=\"{$filename}\"",
            ]
        );
    }

    // ─── Helper ─────────────────────────────────────────────────────────────

    private function totalOutstandingAmount(): float
    {
        $currentMonth = now()->format('Y-m');

        $totalOwed = Application::where('status', 'approved')->get()->sum(function ($app) {
            $base = match ($app->fee_option) {
                'half-day', 'Half Day' => 3800,
                default                => 4200,
            };
            return $base + ($app->snack_box ? 400 : 0);
        });

        $totalPaid = Payment::verified()->where('month_year', $currentMonth)->sum('amount');

        return max(0, $totalOwed - $totalPaid);
    }
}
