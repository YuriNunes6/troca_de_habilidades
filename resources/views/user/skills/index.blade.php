@extends('layouts.app')

@section('title', 'Minhas Skills')

@section('content')
<div class="user-wrapper">
    <div class="container-custom">
        
        {{-- Cabeçalho com Ação Principal --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-5">
            <div>
                <h1 class="page-title">Meu Portfólio de Skills 🏆</h1>
                <p class="page-subtitle text-muted">Estas são as habilidades que você compartilha com a comunidade.</p>
            </div>
            <a href="{{ route('user.skills.edit') }}" class="btn-edit-profile">
                <i class="bi bi-pencil-square"></i> Atualizar Skills
            </a>
        </div>

        {{-- Grid de Exibição --}}
        <div class="skills-display-grid">
            @forelse(auth()->user()->skills as $skill)
                <div class="skill-display-card">
                    <div class="card-top">
                        <div class="skill-icon-box">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        {{-- Badge Dinâmico de Nível --}}
                        @php
                            $nivel = $skill->pivot->nivel_academico;
                            $badgeClass = $nivel == 'avancado' ? 'bg-expert' : ($nivel == 'intermediario' ? 'bg-inter' : 'bg-regular');
                        @endphp
                        <span class="level-badge {{ $badgeClass }}">
                            {{ ucfirst($nivel) }}
                        </span>
                    </div>

                    <div class="card-body-content">
                        <h3 class="display-name">{{ $skill->name }}</h3>
                        
                        <div class="meta-info">
                            <span class="meta-item">
                                <i class="bi bi-clock-history"></i> 
                                {{ $skill->pivot->tempo_experiencia ?? 'Iniciante' }}
                            </span>
                        </div>

                        <p class="display-desc">
                            {{ $skill->pivot->description ?? 'Sem descrição detalhada definida para esta habilidade.' }}
                        </p>
                    </div>
                </div>
            @empty
                {{-- Estado Vazio --}}
                <div class="empty-skills-card">
                    <div class="empty-icon">
                        <i class="bi bi-journal-x"></i>
                    </div>
                    <h3>Você ainda não listou suas habilidades</h3>
                    <p>Adicione skills ao seu perfil para que outros usuários possam encontrar você para trocas de conhecimento.</p>
                    <a href="{{ route('user.skills.edit') }}" class="btn-primary-gradient mt-3">Começar agora</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .user-wrapper {
        background-color: #f8fafc;
        min-height: 100vh;
        padding: 60px 0;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 25px;
    }

    .page-title { font-weight: 800; color: #1e293b; margin: 0; }
    .page-subtitle { font-size: 1.1rem; margin-top: 5px; }

    /* Botão de Edição */
    .btn-edit-profile {
        background: white;
        color: #4f46e5;
        margin-top: 12px;
        margin-bottom: 12px;
        border: 2px solid #4f46e5;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit-profile:hover {
        background: #4f46e5;
        color: white;
        transform: translateY(-2px);
    }

    /* Grid que mantém distância */
    .skills-display-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }

    /* Card de Exibição */
    .skill-display-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
    }

    .skill-display-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .skill-icon-box {
        width: 45px;
        height: 45px;
        background: #eef2ff;
        color: #4f46e5;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    /* Badges de Nível */
    .level-badge {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        padding: 6px 12px;
        border-radius: 50px;
        letter-spacing: 0.5px;
    }

    .bg-expert { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
    .bg-inter { background: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }
    .bg-regular { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }

    .display-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
    }

    .meta-info {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .meta-item {
        font-size: 0.85rem;
        font-weight: 600;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .display-desc {
        font-size: 0.95rem;
        color: #475569;
        line-height: 1.6;
        margin: 0;
    }

    /* Estado Vazio */
    .empty-skills-card {
        grid-column: 1 / -1;
        text-align: center;
        background: white;
        padding: 60px 20px;
        border-radius: 24px;
        border: 2px dashed #cbd5e1;
    }

    .empty-icon { font-size: 3.5rem; color: #94a3b8; margin-bottom: 20px; }
    .empty-skills-card h3 { font-weight: 700; color: #1e293b; }
    .empty-skills-card p { color: #64748b; max-width: 400px; margin: 10px auto; }

    .btn-primary-gradient {
        display: inline-block;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        padding: 12px 25px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 600px) {
        .skills-display-grid { grid-template-columns: 1fr; }
        .d-flex { flex-direction: column; text-align: center; }
        .btn-edit-profile { width: 100%; justify-content: center; }
    }
</style>
@endsection