<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nombre_area',
        'fk_id_sedes',
    ];

    // Relaciones
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_id_sedes', 'id_sedes');
    }
}
