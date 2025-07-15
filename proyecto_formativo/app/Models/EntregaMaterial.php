<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaMaterial extends Model
{
    use HasFactory;

    protected $table = 'entrega_material';
    protected $primaryKey = 'id_entrega';

    protected $fillable = [
        'id_solicitud',
        'id_usuario_responsable',
        'fecha_entrega',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_responsable');
    }
}
