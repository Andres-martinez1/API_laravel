<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioFicha extends Model
{
    use HasFactory;

    protected $table = 'usuario_ficha';

    protected $fillable = [
        'fk_id_usuario',
        'fk_id_ficha',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fk_id_usuario');
    }

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'fk_id_ficha');
    }
}
