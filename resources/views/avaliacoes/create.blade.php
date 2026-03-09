@extends('layouts.app')

@section('title', 'Avaliar Usuário')

@section('content')
<div class="p-6 bg-white rounded shadow max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4">Avaliar Usuário</h1>

    <x-alert />

    <form method="POST" action="{{ route('user.avaliations.store', $session->id) }}">
        @csrf

        <p class="mb-4">
            Avaliando: <strong>{{ $session->request->destinatario->name }}</strong><br>
            Skill: <strong>{{ $session->request->skill->name }}</strong>
        </p>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nota (1 a 5)</label>
            <select name="nota" required class="w-full border rounded px-3 py-2">
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Comentário</label>
            <textarea name="comentario" rows="4" class="w-full border rounded px-3 py-2" placeholder="Opcional"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Enviar Avaliação
        </button>
    </form>
</div>
@endsection