@extends('layouts.app')

@section('title', 'Gerenciar Skills')

@section('content')
<div class="admin-wrapper">
    {{-- Header da Página --}}
    <header class="admin-header">
        <div class="container-custom">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="admin-title">Gestão de Skills</h1>
                    <p class="admin-subtitle">Adicione, edite ou remova as habilidades disponíveis para os usuários.</p>
                </div>
                <a href="{{ route('admin.skills.create') }}" class="btn-add-skill">
                    <i class="bi bi-plus-lg"></i> Nova Habilidade
                </a>
            </div>
        </div>
    </header>

    <div class="container-custom">
        {{-- Listagem de Skills --}}
        <div class="skills-stack">
            @foreach($skills as $skill)
                <div class="skill-item-card">
                    <div class="skill-info">
                        <div class="skill-avatar">
                            {{ substr($skill->name, 0, 1) }}
                        </div>
                        <div class="skill-text">
                            <h2 class="skill-name">{{ $skill->name }}</h2>
                            <p class="skill-description">{{ $skill->description }}</p>
                        </div>
                    </div>

                    <div class="skill-actions">
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn-action-edit">
                            <i class="bi bi-pencil"></i> <span>Editar</span>
                        </a>
                        
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action-delete" 
                                    onclick="return confirm('Tem certeza que deseja remover esta skill?')">
                                <i class="bi bi-trash"></i> <span>Remover</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            @if($skills->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>Nenhuma habilidade cadastrada no momento.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Reaproveitando a base do Admin que criamos */
    .admin-wrapper {
        background-color: #f1f5f9;
        min-height: 100vh;
        padding-bottom: 80px;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 25px;
    }

    .admin-header {
        background: #1e293b;
        padding: 40px 0;
        margin-bottom: 40px;
        color: white;
        border-bottom: 4px solid #8b5cf6; /* Roxo para Skills */
    }

    .admin-title { font-size: 2rem; font-weight: 800; margin: 0; }
    .admin-subtitle { color: #94a3b8; margin: 5px 0 0; margin-bottom: 12px; }

    /* Botão de Adicionar */
    .btn-add-skill {
        background: #10b981;
        color: white;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-skill:hover {
        background: #059669;
        transform: translateY(-2px);
        color: white;
    }

    /* Stack de Itens (O segredo para não grudar) */
    .skills-stack {
        display: flex;
        flex-direction: column;
        gap: 20px; /* Distância vertical entre os itens */
    }

    .skill-item-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }

    .skill-info {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
    }

    .skill-avatar {
        width: 50px;
        height: 50px;
        background: #eef2ff;
        color: #6366f1;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .skill-name {
        font-size: 1.15rem;
        font-weight: 700;
        margin: 0;
        color: #1e293b;
    }

    .skill-description {
        color: #64748b;
        margin: 4px 0 0;
        font-size: 0.95rem;
    }

    /* Ações */
    .skill-actions {
        display: flex;
        gap: 12px;
    }

    .btn-action-edit, .btn-action-delete {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
        border: none;
    }

    .btn-action-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-action-edit:hover { background: #dbeafe; }

    .btn-action-delete {
        background: #fff1f2;
        color: #e11d48;
    }

    .btn-action-delete:hover { background: #ffe4e6; }

    /* Estado Vazio */
    .empty-state {
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 16px;
        color: #94a3b8;
        border: 2px dashed #e2e8f0;
    }

    .empty-state i { font-size: 3rem; display: block; margin-bottom: 10px; }

    /* Mobile */
    @media (max-width: 768px) {
        .skill-item-card {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        .skill-info {
            flex-direction: column;
        }
        .skill-actions {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection