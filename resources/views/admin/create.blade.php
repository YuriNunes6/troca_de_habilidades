@extends('layouts.app')

@section('title', 'Nova Solicitação')

@section('content')
<div class="p-6 bg-white rounded shadow max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Solicitar Sessão</h1>

    <x-alert />

    <form method="POST" action="{{ route('user.requests.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Destinatário</label>
            <select name="destinatario_id" class="w-full border rounded px-3 py-2" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Skill</label>
            <select name="skill_id" class="w-full border rounded px-3 py-2" required>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Mensagem</label>
            <textarea name="mensagem" class="w-full border rounded px-3 py-2" rows="4"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enviar Solicitação</button>
    </form>
</div>
@endsection