@extends('layouts.app')

@section('title', 'Dashboard - SkillSwap')

@section('content')
<div class="skill-dashboard">
    <div class="dashboard-header">
        <div class="container">
            <span class="badge-role">{{ auth()->user()->is_admin ? 'Painel Administrativo' : 'Meu Perfil' }}</span>
            <h1>Olá, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h1>
            <p>Gerencie suas trocas de conhecimento e conexões em um só lugar.</p>
        </div>
    </div>

    <div class="container">
        <div class="action-grid">
            
            @if(auth()->user()->is_admin)
                {{-- ADMIN: GESTÃO DE SKILLS --}}
                <div class="skill-card admin-border">
                    <div class="card-icon"><i class="bi bi-layers"></i></div>
                    <h3>Habilidades Globais</h3>
                    <p>Crie, edite ou remova as categorias de habilidades do sistema.</p>
                    <a href="{{ route('admin.skills.index') }}" class="btn-main admin-btn">Gerenciar Skills</a>
                </div>

                {{-- ADMIN: USUÁRIOS --}}
                <div class="skill-card admin-border">
                    <div class="card-icon"><i class="bi bi-people"></i></div>
                    <h3>Comunidade</h3>
                    <p>Controle de perfis, remoção de usuários e listagem de administradores.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn-main admin-btn">Ver Usuários</a>
                </div>
            @else
                {{-- USUÁRIO: MINHAS SKILLS --}}
                <div class="skill-card">
                    <div class="card-icon"><i class="bi bi-lightning"></i></div>
                    <h3>Minhas Skills</h3>
                    <p>Atualize o que você sabe e o que deseja aprender na plataforma.</p>
                    <div class="btn-group-vertical">
                        <a href="{{ route('user.skills.index') }}" class="btn-main">Ver Minhas Skills</a>
                        <a href="{{ route('user.skills.edit') }}" class="btn-sub">Editar Níveis</a>
                    </div>
                </div>

                {{-- USUÁRIO: SESSÕES --}}
                <div class="skill-card">
                    <div class="card-icon"><i class="bi bi-calendar-check"></i></div>
                    <h3>Sessões de Troca</h3>
                    <p>Visualize suas aulas agendadas e avalie seus parceiros de treino.</p>
                    <a href="{{ route('sessions.index') }}" class="btn-main">Minha Agenda</a>
                </div>

                {{-- USUÁRIO: EXPLORAR/SOLICITAR --}}
                <div class="skill-card">
                    <div class="card-icon"><i class="bi bi-search"></i></div>
                    <h3>Nova Solicitação</h3>
                    <p>Busque usuários e peça uma nova sessão de aprendizado mútuo.</p>
                    <a href="{{ route('requests.create') }}" class="btn-main">Solicitar Troca</a>
                </div>
            @endif

        </div>
    </div>
</div>

<style>
    /* Reset e Variáveis */
    :root {
        --primary: #4f46e5;
        --admin: #1f2937;
        --text-main: #111827;
        --text-sub: #6b7280;
        --bg-page: #f9fafb;
    }

    .skill-dashboard {
        background-color: var(--bg-page);
        min-height: 100vh;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: var(--text-main);
        padding-bottom: 50px;
    }

    /* Cabeçalho Espaçado */
    .dashboard-header {
        background: white;
        padding: 60px 0;
        margin-bottom: 40px;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin: 15px 0;
    }

    .badge-role {
        background: #eef2ff;
        color: var(--primary);
        padding: 6px 16px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
    }

    /* Grid que NÃO GRUDA */
    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px; /* Distância obrigatória entre os cards */
        padding: 10px;
    }

    /* Card Estilizado */
    .skill-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        transition: all 0.3s ease;
        border: 1px solid #f3f4f6;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .admin-border {
        border-top: 5px solid var(--admin);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: #f3f4f6;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--primary);
        margin-bottom: 20px;
    }

    .skill-card h3 {
        font-weight: 700;
        margin-bottom: 15px;
    }

    .skill-card p {
        color: var(--text-sub);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 25px;
        flex-grow: 1;
    }

    /* Botões */
    .btn-main {
        background: var(--primary);
        color: white;
        text-decoration: none;
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: 600;
        width: 100%;
        transition: filter 0.2s;
    }

    .btn-main:hover {
        filter: brightness(1.2);
        color: white;
    }

    .admin-btn {
        background: var(--admin);
    }

    .btn-sub {
        margin-top: 10px;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Ajuste para Mobile */
    @media (max-width: 768px) {
        .dashboard-header { padding: 40px 20px; }
        .action-grid { gap: 20px; }
    }
</style>
@endsection