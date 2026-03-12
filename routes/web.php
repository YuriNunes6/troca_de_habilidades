<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\SkillController as UserSkillController;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Página inicial → Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'cadastroSubmit'])->name('cadastro.submit');


/*
|--------------------------------------------------------------------------
| ÁREA DE USUÁRIO LOGADO
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard usuário comum
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // Usuários
    Route::get('users', [UserController::class,'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class,'show'])->name('users.show');

    // Perfil
    Route::get('/meu-perfil', [UserController::class, 'profile'])->name('users.profile');
    Route::get('/meu-perfil/editar', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/meu-perfil/editar', [UserController::class, 'update'])->name('users.update');

    // Requests
    Route::get('requests/create', [RequestController::class,'create'])
    ->name('requests.create');
    Route::post('requests', [RequestController::class,'store'])->name('requests.store');
    Route::post('requests/{id}/accept', [RequestController::class,'accept'])->name('requests.accept');
    Route::post('requests/{id}/reject', [RequestController::class,'reject'])->name('requests.reject');

    // Sessões
    Route::get('sessions', [SessionController::class,'index'])->name('sessions.index');
    Route::get('sessions/{session}', [SessionController::class,'show'])->name('sessions.show');
    Route::post('sessions/{id}/conclude', [SessionController::class,'conclude'])->name('sessions.conclude');

    // Avaliações
    Route::get('avaliacoes/create', [AvaliacaoController::class,'create'])->name('avaliacoes.create');
    Route::post('avaliacoes', [AvaliacaoController::class,'store'])->name('avaliacoes.store');

    // Skills (visualização)
    Route::middleware(['auth'])->prefix('user')->name('user.')->group(function() {
    Route::get('skills', [App\Http\Controllers\User\SkillController::class,'index'])->name('skills.index');
    Route::get('skills/edit', [UserSkillController::class, 'edit'])
    ->name('skills.edit');
    Route::put('skills/edit', [UserSkillController::class, 'update'])->name('skills.update');
    });
});


/*
|--------------------------------------------------------------------------
| ÁREA ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // ========================
    // Usuários (admin)
    // ========================
    Route::get('users', [UserController::class,'index'])->name('users.index');
    Route::get('admins', [AdminController::class,'index'])->name('admins.index');

    // ========================
    // Skills
    // ========================
    Route::get('skills', [SkillController::class,'index'])->name('skills.index');
    Route::get('skills/create',[SkillController::class,'create'])->name('skills.create');
    Route::post('skills',[SkillController::class,'store'])->name('skills.store');
    Route::get('skills/{skill}/edit',[SkillController::class,'edit'])->name('skills.edit');
    Route::put('skills/{skill}',[SkillController::class,'update'])->name('skills.update');
    Route::delete('skills/{skill}',[SkillController::class,'destroy'])->name('skills.destroy');

    // ========================
    // Admins
    // ========================
    Route::get('admins', [AdminController::class,'index'])->name('admins.index');
    Route::get('admins/create', [AdminController::class,'showCreate'])->name('admins.create');
    Route::post('admins/create', [AdminController::class,'store'])->name('admins.store');
    Route::get('admins/{admin}/edit', [AdminController::class,'edit'])->name('admins.edit');
    Route::put('admins/{admin}', [AdminController::class,'update'])->name('admins.update');
    Route::delete('admins/{admin}', [AdminController::class,'destroy'])->name('admins.destroy');
});