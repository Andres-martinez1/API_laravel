<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';

    protected $fillable = [
        'id_usuario_solicitante',
        'estado_solicitud',
        'fecha_solicitud',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_solicitante');
    }
}
