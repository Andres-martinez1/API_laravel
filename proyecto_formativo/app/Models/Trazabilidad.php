<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trazabilidad extends Model
{
    use HasFactory;

    protected $table = 'trazabilidad';
    protected $primaryKey = 'id_trazabilidad';

    protected $fillable = [
        'fk_id_elemento',
        'tipo_movimiento',
        'fecha',
        'bodega_origen',
        'bodega_destino',
        'estado_actual',
    ];

    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'fk_id_elemento');
    }

    public function origen()
    {
        return $this->belongsTo(Bodega::class, 'bodega_origen');
    }

    public function destino()
    {
        return $this->belongsTo(Bodega::class, 'bodega_destino');
    }
}
