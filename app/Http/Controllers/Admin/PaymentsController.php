<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('admin.payments.index', [
            'payments' => MockData::payments(),
            'children' => MockData::enrolledChildren(),
            'stats' => MockData::dashboardStats(),
        ]);
    }

    public function outstanding()
    {
        $children = collect(MockData::enrolledChildren())->filter(fn($c) => $c['balance'] > 0);

        return view('admin.payments.outstanding', [
            'children' => $children,
        ]);
    }

    public function statements()
    {
        return view('admin.payments.statements', [
            'children' => MockData::enrolledChildren(),
            'payments' => MockData::payments(),
        ]);
    }

    public function record()
    {
        return redirect()->route('admin.payments.index')->with('success', 'Payment recorded successfully');
    }

    public function confirm($id)
    {
        return redirect()->route('admin.payments.index')->with('success', 'Payment confirmed');
    }
}
