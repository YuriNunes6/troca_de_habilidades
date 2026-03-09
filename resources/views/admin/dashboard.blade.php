@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="admin-wrapper">
    {{-- Header com espaçamento generoso --}}
    <header class="admin-header">
        <div class="container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="admin-badge">Acesso Restrito</span>
                    <h1 class="admin-title">Painel do Administrador</h1>
                    <p class="admin-subtitle">Gerencie usuários, curadoria de skills e permissões do sistema.</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container-custom">
        {{-- Grid com Gap forçado para não grudar --}}
        <div class="admin-grid">
            
            {{-- Card: Usuários --}}
            <div class="admin-card">
                <div class="card-icon-area bg-blue">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="card-content">
                    <h3>Usuários</h3>
                    <p>Visualize, edite perfis ou remova usuários comuns da plataforma.</p>
                    <a href="{{ route('admin.users.index') }}" class="admin-link">Gerenciar Membros</a>
                </div>
            </div>

            {{-- Card: Skills --}}
            <div class="admin-card">
                <div class="card-icon-area bg-purple">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <div class="card-content">
                    <h3>Skills</h3>
                    <p>Controle o catálogo de conhecimentos disponíveis para troca.</p>
                    <a href="{{ route('admin.skills.index') }}" class="admin-link">Configurar Skills</a>
                </div>
            </div>

            {{-- Card: Administradores --}}
            <div class="admin-card">
                <div class="card-icon-area bg-dark">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
                <div class="card-content">
                    <h3>Administradores</h3>
                    <p>Acesse a listagem de administradores e gerencie níveis de acesso.</p>
                    <a href="{{ route('admin.admins.index') }}" class="admin-link">Ver Equipe</a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Estilos Globais de Respiro */
    .admin-wrapper {
        background-color: #f1f5f9;
        min-height: 100vh;
        padding-bottom: 80px;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .container-custom {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 25px;
    }

    /* Header */
    .admin-header {
        background: #1e293b; /* Slate Dark */
        padding: 50px 0;
        margin-bottom: 50px;
        color: white;
        border-bottom: 4px solid #3b82f6;
    }

    .admin-title {
        font-size: 2.2rem;
        font-weight: 800;
        margin: 10px 0;
    }

    .admin-subtitle {
        color: #94a3b8;
        font-size: 1.1rem;
    }

    .admin-badge {
        background: rgba(59, 130, 246, 0.2);
        color: #60a5fa;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Grid Inquebrável */
    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 35px; /* DISTÂNCIA GARANTIDA ENTRE CARDS */
    }

    /* Admin Cards */
    .admin-card {
        background: white;
        border-radius: 16px;
        display: flex;
        padding: 30px;
        gap: 20px; /* Espaço entre ícone e texto */
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        transition: transform 0.2s ease;
    }

    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Ícones */
    .card-icon-area {
        min-width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .bg-blue { background: #3b82f6; }
    .bg-purple { background: #8b5cf6; }
    .bg-dark { background: #334155; }

    /* Texto do Card */
    .card-content h3 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #0f172a;
    }

    .card-content p {
        font-size: 0.95rem;
        color: #64748b;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    /* Link/Botão */
    .admin-link {
        display: inline-block;
        color: #3b82f6;
        text-decoration: none;
        font-weight: 600;
        border-bottom: 2px solid transparent;
        transition: all 0.2s;
    }

    .admin-link:hover {
        color: #2563eb;
        border-bottom-color: #2563eb;
    }

    /* Responsividade */
    @media (max-width: 640px) {
        .admin-grid {
            grid-template-columns: 1fr; /* Força uma coluna no celular */
        }
        .admin-card {
            flex-direction: column;
            text-align: center;
        }
        .card-icon-area {
            margin: 0 auto 15px;
        }
    }
</style>
@endsection