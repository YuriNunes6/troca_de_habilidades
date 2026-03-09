@extends('layouts.app')

@section('title', 'Editar Minhas Skills')

@section('content')
<div class="user-wrapper">
    <div class="container-custom">
        
        <div class="header-action mb-5">
            <a href="{{ route('user.skills.index') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Voltar para meu portfólio
            </a>
            <h1 class="page-title mt-3">Atualizar Competências 🚀</h1>
            <p class="page-subtitle">Marque as habilidades que você possui e defina seu nível de domínio atual.</p>
        </div>

        <form method="POST" action="{{ route('user.skills.update') }}">
            @csrf
            @method('PUT')

            <div class="skills-editor-stack">
                @foreach($skills as $skill)
                @php
                    $userSkill = auth()->user()->skills->find($skill->id);
                    $hasSkill = !is_null($userSkill);
                    $currentLevel = $hasSkill ? $userSkill->pivot->nivel_academico : null;
                @endphp

                <div class="skill-edit-card {{ $hasSkill ? 'is-active' : '' }}">
                    <div class="card-main">
                        {{-- Checkbox Estilizada --}}
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="skills[]" value="{{ $skill->id }}" 
                                   id="skill_{{ $skill->id }}" class="skill-toggle"
                                   @if($hasSkill) checked @endif>
                            <label for="skill_{{ $skill->id }}" class="toggle-label"></label>
                        </div>

                        <div class="skill-info">
                            <label for="skill_{{ $skill->id }}" class="skill-name-label">
                                {{ $skill->name }}
                            </label>
                            <p class="skill-hint">{{ Str::limit($skill->description, 80) }}</p>
                        </div>
                    </div>

                    {{-- Seletor de Nível (Aparece com destaque quando a skill é marcada) --}}
                    <div class="level-box {{ $hasSkill ? '' : 'disabled' }}">
                        <div class="select-container">
                            <i class="bi bi-bar-chart-fill"></i>
                            <select name="nivel_academico[{{ $skill->id }}]" class="level-select">
                                <option value="regular" @if($currentLevel == 'regular') selected @endif>Nível Regular</option>
                                <option value="intermediario" @if($currentLevel == 'intermediario') selected @endif>Nível Intermediário</option>
                                <option value="avancado" @if($currentLevel == 'avancado') selected @endif>Nível Avançado / Mentor</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Barra de Ação Flutuante --}}
            <div class="sticky-footer">
                <div class="container-custom d-flex justify-content-between align-items-center">
                    <span class="d-none d-md-inline text-muted">Revise suas escolhas antes de confirmar.</span>
                    <button type="submit" class="btn-confirm-save">
                        <i class="bi bi-check-all"></i> Salvar Minhas Skills
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Interatividade para destacar o card e habilitar o seletor
    document.querySelectorAll('.skill-toggle').forEach(input => {
        input.addEventListener('change', function() {
            const card = this.closest('.skill-edit-card');
            const levelBox = card.querySelector('.level-box');
            
            if(this.checked) {
                card.classList.add('is-active');
                levelBox.classList.remove('disabled');
            } else {
                card.classList.remove('is-active');
                levelBox.classList.add('disabled');
            }
        });
    });
</script>

<style>
    .user-wrapper {
        background-color: #f1f5f9;
        min-height: 100vh;
        padding: 40px 0 120px;
        font-family: 'Inter', sans-serif;
    }

    .container-custom {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-title { font-weight: 800; color: #0f172a; margin-top: 10px; }
    .page-subtitle { color: #64748b; margin-bottom: 12px; }
    .back-link { text-decoration: none; color: #4f46e5; font-weight: 700; }

    /* Stack de Cards */
    .skills-editor-stack {
        display: flex;
        flex-direction: column;
        gap: 15px; /* DISTÂNCIA ENTRE OS CARDS */
    }

    .skill-edit-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        border: 2px solid transparent;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.03);
    }

    .skill-edit-card.is-active {
        border-color: #4f46e5;
        background: #f8faff;
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.1);
    }

    .card-main {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    /* Checkbox Customizada */
    .checkbox-wrapper {
        position: relative;
        width: 26px; height: 26px;
    }

    .skill-toggle { position: absolute; opacity: 0; cursor: pointer; z-index: 2; width: 100%; height: 100%; }
    
    .toggle-label {
        position: absolute;
        top: 0; left: 0;
        width: 26px; height: 26px;
        background: white;
        border: 2px solid #cbd5e1;
        border-radius: 8px;
        transition: 0.2s;
    }

    .skill-toggle:checked + .toggle-label {
        background: #4f46e5;
        border-color: #4f46e5;
    }

    .skill-toggle:checked + .toggle-label::after {
        content: '✓';
        color: white;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        font-weight: 900;
    }

    .skill-name-label {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.1rem;
        cursor: pointer;
        display: block;
    }

    .skill-hint { font-size: 0.85rem; color: #94a3b8; margin: 0; }

    /* Seletor de Nível */
    .level-box {
        transition: opacity 0.3s;
        min-width: 220px;
    }

    .level-box.disabled {
        opacity: 0.3;
        pointer-events: none;
        filter: grayscale(1);
    }

    .select-container {
        position: relative;
        display: flex;
        align-items: center;
    }

    .select-container i {
        position: absolute;
        left: 12px;
        color: #6366f1;
    }

    .level-select {
        width: 100%;
        padding: 10px 12px 10px 35px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: white;
        font-weight: 600;
        color: #475569;
        font-size: 0.9rem;
    }

    /* Footer Fixo */
    .sticky-footer {
        position: fixed;
        bottom: 0; left: 0; right: 0;
        background: white;
        padding: 20px 0;
        border-top: 1px solid #e2e8f0;
        box-shadow: 0 -10px 20px rgba(0,0,0,0.05);
    }

    .btn-confirm-save {
        background: #4f46e5;
        color: white;
        border: none;
        margin-top: 10px;
        padding: 14px 35px;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-confirm-save:hover { background: #3730a3; transform: scale(1.02); }

    @media (max-width: 768px) {
        .skill-edit-card { flex-direction: column; align-items: flex-start; }
        .level-box { width: 100%; }
        .btn-confirm-save { width: 100%; justify-content: center; }
    }
</style>
@endsection