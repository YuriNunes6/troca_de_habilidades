@extends('layouts.app')

@section('title', 'Editar Skill')

@section('content')
<div class="admin-wrapper">
    <div class="container-custom">
        
        {{-- Link de Voltar --}}
        <div class="mb-4">
            <a href="{{ route('admin.skills.index') }}" class="text-decoration-none text-secondary fw-semibold">
                <i class="bi bi-arrow-left"></i> Voltar para a listagem
            </a>
        </div>

        <div class="form-container">
            {{-- Cabeçalho do Formulário --}}
            <div class="form-header">
                <div class="icon-circle bg-purple">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h1 class="form-title">Editar Habilidade</h1>
                <p class="form-subtitle">Atualize as informações que serão exibidas para os usuários.</p>
            </div>

            {{-- Formulário --}}
            <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}" class="skill-form">
                @csrf
                @method('PUT')

                <div class="input-group-custom">
                    <label for="name">Nome da Skill</label>
                    <input type="text" id="name" name="name" 
                           value="{{ old('name', $skill->name) }}" 
                           placeholder="Ex: Laravel Avançado" 
                           required>
                    <small>Escolha um nome claro e objetivo.</small>
                </div>

                <div class="input-group-custom">
                    <label for="description">Descrição Detalhada</label>
                    <textarea id="description" name="description" 
                              rows="5" 
                              placeholder="Descreva o que será ensinado nesta habilidade..." >
                              {{ old('description', $skill->description) }}</textarea>
                </div>

                <div class="form-actions mt-4">
                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-lg"></i> Salvar Alterações
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .admin-wrapper {
        background-color: #f1f5f9;
        min-height: 100vh;
        padding: 60px 0;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 600px; /* Formulários ficam melhores se forem mais estreitos */
        margin: 0 auto;
        padding: 0 20px;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
    }

    .form-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 1.5rem;
        color: white;
    }

    .bg-purple { background: #8b5cf6; }

    .form-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .form-subtitle {
        color: #64748b;
        font-size: 0.95rem;
    }

    /* Estilo dos Inputs - Nada de grudado! */
    .input-group-custom {
        margin-bottom: 25px;
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
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.2s;
        outline: none;
    }

    .input-group-custom input:focus, 
    .input-group-custom textarea:focus {
        border-color: #8b5cf6;
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
    }

    .input-group-custom small {
        color: #94a3b8;
        font-size: 0.8rem;
        display: block;
        margin-top: 5px;
    }

    /* Botões */
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .btn-save {
        background: #8b5cf6;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-save:hover {
        background: #7c3aed;
        transform: translateY(-2px);
    }

    .btn-cancel {
        text-align: center;
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
        padding: 10px;
        font-size: 0.9rem;
    }

    .btn-cancel:hover {
        color: #1e293b;
    }
</style>
@endsection