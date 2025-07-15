<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $table = 'bodegas';

    protected $primaryKey = 'id_bodega';

    protected $fillable = [
        'nombre_bodega',
        'encargado',
        'fk_id_sede',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_id_sede', 'id_sedes');
    }
}
