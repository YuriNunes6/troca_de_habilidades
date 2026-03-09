@extends('layouts.app')

@section('title', 'Login - SkillSwap')

@section('content')
<div class="auth-wrapper">
    <div class="container-custom">
        <div class="auth-card">
            
            {{-- Header de Login --}}
            <div class="auth-header">
                <div class="brand-logo">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h1 class="auth-title">Bem-vindo de volta!</h1>
                <p class="auth-subtitle">Acesse sua conta para continuar suas trocas de conhecimento.</p>
            </div>

            {{-- Mensagens de Erro/Validação --}}
            @if(session('error') || $errors->any())
                <div class="alert-custom error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <div>
                        @if(session('error'))
                            <span>{{ session('error') }}</span>
                        @else
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Formulário de Login --}}
            <form class="form-grid" method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="input-group-custom">
                    <label for="email">E-mail</label>
                    <div class="input-icon-wrapper">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" id="email" 
                               placeholder="exemplo@gmail.com" 
                               value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="input-group-custom">
                    <div class="d-flex justify-content-between">
                        <label for="password">Senha</label>
                    </div>
                    <div class="input-icon-wrapper">
                        <i class="bi bi-key"></i>
                        <input type="password" name="password" id="password" 
                               placeholder="Sua senha secreta" required>
                    </div>
                </div>

                <button type="submit" class="btn-login-main">
                    Entrar na Plataforma <i class="bi bi-box-arrow-in-right"></i>
                </button>
            </form>

            {{-- Rodapé de Cadastro --}}
            <div class="auth-footer">
                <div class="divider"><span>Ainda não tem conta?</span></div>
                
                <div class="register-cta">
                    <p>Junte-se a centenas de usuários trocando habilidades.</p>
                    <a href="{{ route('cadastro') }}" class="btn-register-link">
                        Criar minha conta gratuita
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Base e Respiro */
    .auth-wrapper {
        background-color: #f8fafc;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 40px 0;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        width: 100%;
        max-width: 480px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .auth-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    /* Cabeçalho */
    .auth-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .brand-logo {
        width: 64px;
        height: 64px;
        background: #1e293b;
        color: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 20px;
        box-shadow: 0 8px 15px rgba(30, 41, 59, 0.2);
    }

    .auth-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .auth-subtitle {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Formulário - Distância entre campos */
    .form-grid {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .input-group-custom label {
        display: block;
        font-weight: 600;
        color: #334155;
        font-size: 0.85rem;
        margin-bottom: 8px;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 1.1rem;
    }

    .input-icon-wrapper input {
        width: 100%;
        padding-top: 16px;
        padding-bottom: 16px;
        padding-left: 14px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.2s ease;
        background: #fcfdfe;
    }

    .input-icon-wrapper input:focus {
        outline: none;
        border-color: #1b5fa7;
        background: white;
        box-shadow: 0 0 0 4px rgba(27, 95, 167, 0.1);
    }

    /* Botão Principal */
    .btn-login-main {
        background: #1b5fa7;
        color: white;
        border: none;
        padding: 16px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-login-main:hover {
        background: #14437a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(27, 95, 167, 0.3);
    }

    /* Rodapé e Link de Registro */
    .auth-footer {
        margin-top: 35px;
        text-align: center;
    }

    .divider {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        color: #cbd5e1;
    }

    .divider::before, .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #e2e8f0;
    }

    .divider span {
        padding: 0 12px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .register-cta p {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 12px;
    }

    .btn-register-link {
        color: #1b5fa7;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.95rem;
        transition: color 0.2s;
    }

    .btn-register-link:hover {
        color: #14437a;
        text-decoration: underline;
    }

    /* Alertas */
    .alert-custom {
        display: flex;
        gap: 12px;
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 25px;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .alert-custom.error {
        background: #fff1f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    /* Responsividade */
    @media (max-width: 480px) {
        .auth-card {
            padding: 30px 20px;
        }
    }
</style>
@endsection