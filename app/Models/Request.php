<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'solicitante_id',
        'destinatario_id',
        'skill_id',
        'mensagem',
        'status',
    ];

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'solicitante_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function session()
    {
        return $this->hasOne(Session::class);
    }
    
}
