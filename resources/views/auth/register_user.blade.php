@extends('layouts.auth')

@section('title', 'Cadastro de Usuário')

@section('content')
<x-auth-card>
    <h2 class="text-xl font-bold mb-4 text-center">Cadastro de Usuário</h2>

    <form method="POST" action="{{ route('register.user') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium">Nome</label>
            <input id="name" type="text" name="name" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input id="email" type="email" name="email" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-medium">Senha</label>
            <input id="password" type="password" name="password" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-1 font-medium">Confirme a Senha</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit"
            class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Cadastrar</button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Já tem conta? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Entrar</a>
    </p>
</x-auth-card>
@endsection