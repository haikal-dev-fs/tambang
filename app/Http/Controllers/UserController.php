<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:viewer,admin,superadmin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        // Admin tidak boleh edit Superadmin
        if (auth::user()->role === 'admin' && $user->role === 'superadmin') {
            abort(403, 'Admin tidak diizinkan mengedit superadmin');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Admin tidak boleh update Superadmin
        if (auth::user()->role === 'admin' && $user->role === 'superadmin') {
            abort(403, 'Admin tidak diizinkan mengubah superadmin');
        }


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'sometimes|in:viewer,admin,superadmin',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        // Hanya superadmin yang boleh update role
        if (auth::user()->role === 'superadmin' && isset($validated['role'])) {
            $data['role'] = $validated['role'];
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
