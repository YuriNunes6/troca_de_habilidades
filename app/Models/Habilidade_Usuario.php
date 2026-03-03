<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade_Usuario extends Model
{
    use HasFactory;


    public function usuario()
    {   
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function habilidade()
    {       
        return $this->belongsTo(Habilidade::class, 'habilidade_id');
    }

    protected $fillable = [
        'nivel_aprendizado',
        'tempo_experiencia',
        'descricao',   
    ];

}
