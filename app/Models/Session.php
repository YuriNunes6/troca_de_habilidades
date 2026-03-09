<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'request_id',
        'data_sessao',
        'start_time',
        'end_time',
        'status',
        'observacoes',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function solicitante()
    {
        return $this->request->solicitante();
    }

    public function destinatario()
    {
        return $this->request->destinatario();
    }

    public function avaliacao()
    {
        return $this->hasMany(Rating::class);
    }
}
