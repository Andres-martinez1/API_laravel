<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'correo',
        'password',
        'fk_id_area',
        'fk_id_rol',
    ];

    protected $hidden = ['password'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'fk_id_area');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fk_id_rol');
    }
}
