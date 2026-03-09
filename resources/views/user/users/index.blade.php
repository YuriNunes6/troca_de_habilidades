@extends('layouts.app')

@section('title', 'Usuários e Skills')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Usuários Registrados</h1>

    <ul class="space-y-4">
        @foreach($users as $user)
            @if($user->id !== auth()->id())
            <li class="bg-white p-4 rounded shadow">
                <h2 class="font-bold">{{ $user->name }}</h2>
                <p>Email: {{ $user->email }}</p>
                <ul class="mt-2">
                    @foreach($user->skills as $skill)
                        <li>{{ $skill->name }} ({{ $skill->pivot->nivel_academico }})</li>
                    @endforeach
                </ul>
                <a href="{{ route('user.requests.create', $user->id) }}"
                   class="mt-2 inline-block bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                    Solicitar Sessão
                </a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
@endsection