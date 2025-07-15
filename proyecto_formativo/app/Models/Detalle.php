<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detalle extends Model
{
    use HasFactory;

    protected $table = 'detalles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'movimiento',
        'fk_id_elemento',
        'asignado',
        'estado',
        'retorno',
        'fecha',
        'fk_id_ficha',
        'id_solicitud',
    ];

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'fk_id_ficha');
    }

    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'fk_id_elemento');
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }
}
