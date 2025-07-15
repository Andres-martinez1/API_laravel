<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $table = 'elementos';
    protected $primaryKey = 'id_elemento';

    protected $fillable = [
        'nombre_elemento',
        'stock',
        'clasificacion',
        'ficha_tecnica',
        'uso',
        'estado',
        'serial',
        'fk_id_bodega',
        'tipo',
        'fecha_salida',
        'fecha_ingreso',
        'fecha_caducidad',
    ];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'fk_id_bodega');
    }
}
