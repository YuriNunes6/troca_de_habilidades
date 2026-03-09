@extends('layouts.app')

@section('title', 'Cadastrar Skill')

@section('content')
<div class="admin-wrapper">
    <div class="container-custom">
        
        {{-- Navegação de Retorno --}}

        <div class="form-container">
            {{-- Cabeçalho --}}
            <div class="form-header">
                <div class="icon-circle bg-green">
                    <i class="bi bi-plus-circle-fill"></i>
                </div>
                <h1 class="form-title">Nova Habilidade</h1>
                <p class="form-subtitle">Cadastre uma nova categoria de conhecimento para a comunidade.</p>
            </div>

            {{-- Alerta de Sucesso --}}
            @if(session('success'))
                <div class="alert-custom success mb-4">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif

            {{-- Formulário --}}
            <form action="{{ route('admin.skills.store') }}" method="POST" class="skill-form">
                @csrf

                <div class="input-group-custom">
                    <label for="name">Nome da Habilidade</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name') }}" 
                           class="@error('name') is-invalid @enderror" 
                           placeholder="Ex: Design de Interface (UI)" 
                           required>
                    @error('name')
                        <span class="error-text"><i class="bi bi-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group-custom">
                    <label for="description">Descrição (Opcional)</label>
                    <textarea name="description" id="description" 
                              rows="4" 
                              placeholder="Explique brevemente o que os usuários podem ensinar ou aprender aqui..."
                              class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions mt-4">
                    <button type="submit" class="btn-save btn-green">
                        <i class="bi bi-cloud-arrow-up"></i> Cadastrar Skill
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="btn-cancel">Cancelar e Sair</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Base unificada para evitar conflitos */
    .admin-wrapper {
        background-color: #f1f5f9;
        min-height: 100vh;
        padding: 60px 0;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 550px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        padding: 45px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #e2e8f0;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .icon-circle {
        width: 65px;
        height: 65px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 1.8rem;
        color: white;
    }

    .bg-green { background: #10b981; }

    .form-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }

    .form-subtitle {
        color: #64748b;
        margin-top: 8px;
        font-size: 0.95rem;
    }

    /* Inputs e Labels */
    .input-group-custom {
        margin-bottom: 22px;
    }

    .input-group-custom label {
        display: block;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .input-group-custom input, 
    .input-group-custom textarea {
        width: 100%;
        padding: 14px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }

    .input-group-custom input:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }

    /* Erros e Alertas */
    .is-invalid {
        border-color: #ef4444 !important;
    }

    .error-text {
        color: #ef4444;
        font-size: 0.85rem;
        font-weight: 500;
        margin-top: 6px;
        display: block;
    }

    .alert-custom {
        padding: 15px;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-custom.success {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    /* Botões */
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .btn-save {
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        border: none;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: transform 0.2s, background 0.2s;
    }

    .btn-green { background: #10b981; }
    .btn-green:hover { background: #059669; transform: translateY(-2px); }

    .btn-cancel {
        text-align: center;
        color: #94a3b8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 10px;
    }

    .btn-cancel:hover { color: #475569; }
</style>
@endsection