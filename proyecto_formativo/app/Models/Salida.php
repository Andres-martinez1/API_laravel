<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salidas';
    protected $primaryKey = 'id_salida';

    protected $fillable = [
        'fk_id_bodega',
        'fk_id_elemento',
        'cantidad_entregada',
        'area_destino',
        'fecha_salida',
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
