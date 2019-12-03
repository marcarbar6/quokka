<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora', 'localizacion', 'medico_id', 'paciente_id'];


    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function sumaMinutos(){

        $total = strtotime ( '+15 minute' , strtotime ($this->fecha_hora) ) ;
        $fecha_fin = date('Y-m-d\ H:i', $total);
        return $fecha_fin;
    }
}
