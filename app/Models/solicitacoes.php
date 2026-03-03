<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitacoes extends Model
{
    use HasFactory;

    public function sessoes()
    {       
        return $this->belongsTo(sessoes::class, 'solicitante_id');
    }

     public function usuario()
    {       
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }

     public function habilidade()
    {       
        return $this->belongsTo(Habilidade::class, 'habilidade_id');
    }  
    
    protected $fillable = [
        'mensagem',
        'status',
    ];
}
