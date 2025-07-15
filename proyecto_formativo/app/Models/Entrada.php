<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';
    protected $primaryKey = 'id_entrada';

    protected $fillable = [
        'fk_id_bodega',
        'fk_id_elemento',
        'cantidad_ingresada',
        'proveedor',
        'fecha_ingreso',
    ];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'fk_id_bodega');
    }

    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'fk_id_elemento');
    }
}
