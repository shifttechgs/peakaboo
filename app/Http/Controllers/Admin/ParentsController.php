<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function index(Request $request)
    {
        $query = User::withTrashed()
            ->with('roles', 'applications')
            ->whereHas('roles', fn($q) => $q->where('name', 'parent'));

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where(fn($q) => $q
                ->where('name', 'LIKE', $term)
                ->orWhere('email', 'LIKE', $term)
                ->orWhere('phone', 'LIKE', $term));
        }

        if ($request->status === 'active') {
            $query = User::with('roles', 'applications')
                ->whereHas('roles', fn($q) => $q->where('name', 'parent'));
            if ($request->filled('search')) {
                $term = '%' . $request->search . '%';
                $query->where(fn($q) => $q
                    ->where('name', 'LIKE', $term)
                    ->orWhere('email', 'LIKE', $term)
                    ->orWhere('phone', 'LIKE', $term));
            }
        } elseif ($request->status === 'inactive') {
            $query = User::onlyTrashed()->with('roles', 'applications')
                ->whereHas('roles', fn($q) => $q->where('name', 'parent'));
            if ($request->filled('search')) {
                $term = '%' . $request->search . '%';
                $query->where(fn($q) => $q
                    ->where('name', 'LIKE', $term)
                    ->orWhere('email', 'LIKE', $term)
                    ->orWhere('phone', 'LIKE', $term));
            }
        }

        $parents = $query->orderBy('name')->paginate(20)->withQueryString();

        $stats = [
            'total_parents'   => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'parent'))->count(),
            'total_children'  => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'child'))->count(),
            'active_parents'  => User::whereHas('roles', fn($q) => $q->where('name', 'parent'))->count(),
            'total_apps'      => Application::whereIn('status', ['approved'])->count(),
        ];

        return view('admin.parents.index', compact('parents', 'stats'));
    }

    public function show(Request $request, $id)
    {
        $parent = User::withTrashed()->with('roles', 'applications')->findOrFail($id);

        return view('admin.parents.show', compact('parent'));
    }

    public function children(Request $request)
    {
        $query = User::withTrashed()
            ->with('roles', 'applications')
            ->whereHas('roles', fn($q) => $q->where('name', 'child'));

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where(fn($q) => $q->where('name', 'LIKE', $term)->orWhere('email', 'LIKE', $term));
        }

        $children = $query->orderBy('name')->paginate(20)->withQueryString();

        $stats = [
            'total'   => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'child'))->count(),
            'active'  => User::whereHas('roles', fn($q) => $q->where('name', 'child'))->count(),
            'with_apps' => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'child'))
                ->whereHas('applications')->count(),
        ];

        return view('admin.parents.children', compact('children', 'stats'));
    }

    public function showChild($id)
    {
        $child = User::withTrashed()->with('roles', 'applications')->findOrFail($id);

        // Get linked parent if any
        $parent = null;
        $latestApp = $child->applications()->latest()->first();
        if ($latestApp && $latestApp->parent_user_id) {
            $parent = User::withTrashed()->find($latestApp->parent_user_id);
        }

        return view('admin.parents.child-detail', compact('child', 'parent', 'latestApp'));
    }

    public function sendMessage($id)
    {
        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
