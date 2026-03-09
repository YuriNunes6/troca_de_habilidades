@extends('layouts.app')

@section('title', 'Gerenciar Usuários')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Usuários Registrados</h1>

    <ul class="space-y-4">
        @foreach($users as $user)
        <li class="bg-white p-4 rounded shadow flex justify-between items-center">
            <div>
                <h2 class="font-bold">{{ $user->name }}</h2>
                <p>Email: {{ $user->email }}</p>
            </div>
            <div class="space-x-2">
                <a href="{{ route('admin.users.edit', $user->id) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Editar</a>
                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                            onclick="return confirm('Tem certeza que deseja remover este usuário?')">Remover</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection