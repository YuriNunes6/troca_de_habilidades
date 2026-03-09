@extends('layouts.app')

@section('title', 'Detalhes da Sessão')

@section('content')
<div class="p-6 bg-white rounded shadow max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Sessão de {{ $session->request->skill->name }}</h1>

    <p><strong>Participante:</strong> {{ $session->request->destinatario->name }}</p>
    <p><strong>Status:</strong> {{ ucfirst($session->status) }}</p>
    <p><strong>Data:</strong> {{ $session->data_sessao->format('d/m/Y') }}</p>
    <p><strong>Início:</strong> {{ $session->start_time }}</p>
    <p><strong>Fim:</strong> {{ $session->end_time }}</p>
    <p><strong>Observações:</strong> {{ $session->observacoes }}</p>

    @if($session->status === 'concluida')
        <a href="{{ route('user.avaliations.create', $session->id) }}"
           class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Avaliar Usuário
        </a>
    @endif
</div>
@endsection