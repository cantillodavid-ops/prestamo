<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [ 'equipo_id', 'solicitante_id','fecha_prestamo', 'fecha_devolucion_esperada', 'fecha_devolucion_real'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class);
    }
}
