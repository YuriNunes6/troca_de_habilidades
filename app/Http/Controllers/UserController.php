<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile() {
        $user = auth()->user()->load('skills');
        return view('users.profile', compact('user'));
    }

    public function edit() {
        $user = auth()->user()->load('skills');
        return view('users.edit', compact('user'));
    }

    public function update(Request $request) {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name','email'));

        return redirect()->route('users.profile')->with('success', 'Perfil atualizado!');
    }

    public function index() {

       $users = User::where('role','user')
        ->with('skills')
        ->paginate(10);

        return view('user.users.index', compact('users'));
    }

    public function show(User $user) {
        $user->load('skills', 'avaliacoes');
        return view('user.user.show', compact('user'));
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Você não pode deletar seu próprio usuário.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário removido!');
    }
}