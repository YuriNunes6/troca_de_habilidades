<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessoes extends Model
{
    protected $table = 'sessoes';


    protected $fillable = [
        'id_usuario',
        'id_habilidade',
        'horario_inicio',
        'horario_fim',
        'data',
        'status',
        'observacoes'
    ];

  

    // Usuário da sessao
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');// Relacionamento com o modelo User, usando a chave estrangeira 'id_usuario'
    }

    // Habilidade da sessão
    public function habilidade()
    {
        return $this->belongsTo(Habilidade::class, 'id_habilidade');// Relacionamento com o modelo Habilidade, usando a chave estrangeira 'id_habilidade'
    }
}

 