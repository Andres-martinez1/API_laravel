<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centro extends Model
{
    use HasFactory;

    protected $table = 'centros';
    protected $primaryKey = 'id_centro';

    protected $fillable = [
        'nombre_centro',
        'fk_id_municipio',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'fk_id_municipio', 'id_municipio');
    }
}
