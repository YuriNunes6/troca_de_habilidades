@extends('layouts.app')

@section('title', 'Criar Conta - SkillSwap')

@section('content')
<div class="auth-wrapper">
    <div class="container-custom">
        
        <div class="auth-card">
            {{-- Lado Esquerdo: Boas-vindas --}}
            <div class="auth-header">
                <div class="brand-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <h1 class="auth-title">Junte-se à nossa Comunidade</h1>
                <p class="auth-subtitle">Crie sua conta para começar a ensinar e aprender novas habilidades hoje mesmo.</p>
            </div>

            {{-- Alertas de Feedback --}}
            @if(session('success'))
                <div class="alert-custom success">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            {{-- Formulário com Grid para não apertar os campos --}}
            <form class="form-grid" action="{{ route('cadastro.submit') }}" method="POST">
                @csrf
                
                <div class="input-container">
                    <label>Nome Completo</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person"></i>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Como quer ser chamado?" required>
                    </div>
                    @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="input-container">
                    <label>E-mail Acadêmico/Profissional</label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="seu@email.com" required>
                    </div>
                    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="row-inputs">
                    <div class="input-container">
                        <label>Insira uma Senha</label>
                        <div class="input-wrapper">
                            <i class="bi bi-lock"></i>
                            <input type="password" name="password" placeholder="••••••••" required>
                        </div>
                        @error('password') <span class="error-msg">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-container">
                        <label>Confirmar Senha</label>
                        <div class="input-wrapper">
                            <i class="bi bi-shield-check"></i>
                            <input type="password" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="input-container">
                    <label>Sua principal Habilidade</label>
                    <div class="input-wrapper">
                        <i class="bi bi-star"></i>
                        <select name="skills" required>
                            <option value="" selected disabled>O que você domina?</option>
                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-primary-action">
                    Começar minha jornada <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            {{-- Divisor --}}
            <div class="auth-divider">
                <span>JÁ POSSUI UMA CONTA?</span>
            </div>

            {{-- Card Admin - Estilo Diferenciado --}}
            <div class="auth-footer">         
                <div class="admin-cta">
                    <p>Junte-se a centenas de usuários trocando habilidades.</p>
                    <a href="{{ route('login') }}" class="btn-admin-link">
                        Criar minha conta gratuita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos de Estrutura e Respiro */
    .auth-wrapper {
        background-color: #f0f2f5;
        min-height: 100vh;
        padding: 50px 0;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 550px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .auth-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 45px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.06);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .brand-icon {
        width: 60px;
        height: 60px;
        background: #eef2ff;
        color: #4f46e5;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 20px;
    }

    .auth-title { font-size: 1.8rem; font-weight: 800; color: #1f2937; margin-bottom: 10px; }
    .auth-subtitle { color: #6b7280; font-size: 0.95rem; line-height: 1.5; }

    /* Formulário - Sem Grudar nada */
    .form-grid {
        display: flex;
        flex-direction: column;
        gap: 20px; /* Distância sagrada entre as linhas do form */
    }

    .row-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .input-container label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #374151;
        margin-bottom: 8px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-wrapper i {
        position: absolute;
        left: 15px;
        color: #9ca3af;
        font-size: 1.1rem;
    }

    .input-wrapper input, 
    .input-wrapper select {
        width: 100%;
        padding-top: 16px;
        padding-bottom: 16px;
        padding-left: 14px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.2s;
        background: #f9fafb;
    }

    .input-wrapper input:focus, 
    .input-wrapper select:focus {
        border-color: #4f46e5;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }

    /* Botões */
    .btn-primary-action {
        background: #4f46e5;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
        transition: all 0.3s;
    }

    .btn-primary-action:hover {
        background: #4338ca;
        transform: translateY(-2px);
    }

    .btn-admin-link {
        color: #1b5fa7;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.95rem;
        transition: color 0.2s;
    }

    .btn-admin-link:hover {
        color: #14437a;
        text-decoration: underline;
    }

    /* Rodapé e Admin CTA */
    .auth-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 30px 0;
        color: #d1d5db;
    }

    .auth-divider::before, .auth-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
    }

    .auth-divider span { padding: 0 15px; font-size: 0.8rem; font-weight: 700; }
    
    .admin-cta {
        background: #f8fafc;
        border: 1px dashed #cbd5e1;
        padding: 20px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .admin-cta h5 { font-size: 0.95rem; font-weight: 700; margin: 0; color: #1e293b; }
    
    .admin-cta p { font-size: 0.85rem; margin: 2px 0 0; color: #64748b; }

    .btn-outline-admin {
        padding: 8px 16px;
        border: 2px solid #1e293b;
        color: #1e293b;
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-outline-admin:hover {
        background: #1e293b;
        color: white;
    }

    /* Erros e Alertas */
    .error-msg { color: #ef4444; font-size: 0.75rem; margin-top: 5px; display: block; }
    .alert-custom { padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem; font-weight: 600; }
    .alert-custom.success { background: #dcfce7; color: #166534; }

    @media (max-width: 500px) {
        .row-inputs { grid-template-columns: 1fr; }
        .auth-card { padding: 30px 20px; }
        .admin-cta { flex-direction: column; text-align: center; gap: 15px; }
    }
</style>
@endsection