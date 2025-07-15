<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioBodega extends Model
{
    use HasFactory;

    protected $table = 'usuario_bodega';

    protected $fillable = [
        'fk_id_usuario',
        'fk_id_bodega',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'fk_id_bodega');
    }
}
