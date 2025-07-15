<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSolicitud extends Model
{
    use HasFactory;

    protected $table = 'detalle_solicitud';
    protected $primaryKey = 'id_detalle_solicitud';

    protected $fillable = [
        'id_solicitud',
        'id_producto',
        'cantidad_solicitada',
        'observaciones',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }

    public function producto()
    {
        return $this->belongsTo(Elemento::class, 'id_producto');
    }
}
