<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    protected $fillable = [
        'fk_id_usuario',
        'fk_id_elemento',
        'fecha',
        'responsable',
        'pedir',
        'suministrar',
        'devolver',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }

    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'fk_id_elemento');
    }
}
