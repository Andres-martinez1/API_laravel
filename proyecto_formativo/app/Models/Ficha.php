<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'ficha';
    protected $primaryKey = 'id_ficha';

    protected $fillable = [
        'numero_ficha',
        'fk_id_programa',
        'fk_id_municipio',
        'fk_id_sede',
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'fk_id_programa');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'fk_id_municipio');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_id_sede');
    }
}
