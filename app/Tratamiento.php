<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['fecha_inicio', 'fecha_fin','descripcion','unidades','frecuencia','instrucciones','medicamento_id'];

    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }
}
