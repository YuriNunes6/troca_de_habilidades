<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'session_id',
        'avaliador_id',
        'user_avaliado_id',
        'nota',
        'comentario',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function avaliador()
    {
        return $this->belongsTo(User::class, 'avaliador_id');
    }

    public function user_avaliado()
    {
        return $this->belongsTo(User::class, 'user_avaliado_id');
    }
}
