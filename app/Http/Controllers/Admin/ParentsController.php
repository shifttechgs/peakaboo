<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class ParentsController extends Controller
{
    public function index()
    {
        return view('admin.parents.index', [
            'children' => MockData::enrolledChildren(),
        ]);
    }

    public function children()
    {
        return view('admin.parents.children', [
            'children' => MockData::enrolledChildren(),
            'classes' => MockData::classes(),
        ]);
    }

    public function showChild($id)
    {
        $children = MockData::enrolledChildren();
        $child = collect($children)->firstWhere('id', $id) ?? $children[0];

        return view('admin.parents.child-detail', [
            'child' => $child,
            'payments' => MockData::payments(),
        ]);
    }

    public function show($id)
    {
        $children = MockData::enrolledChildren();
        $child = collect($children)->firstWhere('id', $id) ?? $children[0];

        return view('admin.parents.show', [
            'parent' => $child,
        ]);
    }

    public function sendMessage($id)
    {
        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
