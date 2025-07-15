<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';
    protected $primaryKey = 'id_sedes';

    protected $fillable = [
        'nombre_sede',
        'fk_id_centro',
    ];

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'fk_id_centro');
    }
}
