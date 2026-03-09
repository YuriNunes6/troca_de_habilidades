@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Meu Perfil</h1>

    <p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

    <a href="{{ route('user.profile.edit') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Editar Perfil
    </a>
</div>
@endsection