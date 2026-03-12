<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{


    public function showCreate()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin criado com sucesso!');
    }

    public function index()
    {
        $admins = User::where('role', 'admin')->paginate(10);

        return view('admin.users.index', compact('admins'));
    }

    public function edit(User $admin)
    {
        return view('admin.users.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
        ]);

        $admin->update($request->only('name', 'email'));

        return redirect()->route('admins.index')->with('success', 'Admin atualizado com sucesso!');
    }

    public function destroy(User $admin)
    {
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'Você não pode deletar seu próprio usuário.');
        }
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin removido com sucesso!');
    }

}