<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrega extends Model
{
    use HasFactory;

    protected $table = 'detalles_entrega';
    protected $primaryKey = 'id_detalle_entrega';

    protected $fillable = [
        'id_entrega',
        'id_instructor_receptor',
        'id_ficha_formacion',
        'visto_bueno_aprendiz',
    ];

    public function entrega()
    {
        return $this->belongsTo(EntregaMaterial::class, 'id_entrega');
    }

    public function instructor()
    {
        return $this->belongsTo(Usuario::class, 'id_instructor_receptor');
    }

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'id_ficha_formacion');
    }
}
