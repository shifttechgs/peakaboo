<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->status === 'deactivated') {
            $query = User::onlyTrashed()->with('roles');
        } elseif ($request->status === 'active') {
            $query = User::with('roles');
        } else {
            $query = User::withTrashed()->with('roles');
        }

        if ($request->filled('role')) {
            $query->whereHas('roles', fn($q) => $q->where('name', $request->role));
        }

        if ($request->filled('search')) {
            $term = '%' . $request->search . '%';
            $query->where(fn($q) => $q->where('name', 'LIKE', $term)->orWhere('email', 'LIKE', $term));
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        $stats = [
            'total'    => User::withTrashed()->count(),
            'admins'   => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'admin'))->count(),
            'teachers' => User::withTrashed()->whereHas('roles', fn($q) => $q->where('name', 'teacher'))->count(),
            'families' => User::withTrashed()->whereHas('roles', fn($q) => $q->whereIn('name', ['parent', 'child']))->count(),
        ];

        return view('admin.users.index', compact('users', 'stats'));
    }

    public function create()
    {
        $roles = ['admin', 'teacher', 'parent', 'child'];
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:8|confirmed',
            'role'                  => 'required|in:admin,teacher,parent,child',
            'phone'                 => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')
            ->with('success', "User \"{$user->name}\" created successfully.");
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'teacher', 'parent', 'child'];
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|min:8|confirmed',
            'role'     => 'required|in:admin,teacher,parent,child',
            'phone'    => 'nullable|string|max:20',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')
            ->with('success', "User \"{$user->name}\" updated successfully.");
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "User \"{$user->name}\" has been deactivated.");
    }

    public function restore(int $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.users.index')
            ->with('success', "User \"{$user->name}\" has been restored.");
    }

    public function forceDelete(int $id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot permanently delete your own account.');
        }

        $name = $user->name;
        $user->forceDelete();

        return redirect()->route('admin.users.index')
            ->with('success', "User \"{$name}\" has been permanently deleted.");
    }
}
