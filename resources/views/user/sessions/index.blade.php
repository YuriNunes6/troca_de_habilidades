@extends('layouts.app')

@section('title', 'Minhas Sessões')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Minhas Sessões</h1>

    <ul class="space-y-4">
        @foreach($sessions as $session)
        <li class="bg-white p-4 rounded shadow flex justify-between items-center">
            <div>
                <strong>Skill:</strong> {{ $session->request->skill->name }}<br>
                <strong>Status:</strong> {{ ucfirst($session->status) }}<br>
                <strong>Data:</strong> {{ $session->data_sessao->format('d/m/Y') }}
            </div>
            <a href="{{ route('user.sessions.show', $session->id) }}"
               class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                Detalhes
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection