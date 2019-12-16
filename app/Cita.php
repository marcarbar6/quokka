<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora', 'localizacion', 'duracion','medico_id', 'paciente_id'];
    protected $dates = ['fecha_hora','fecha_fin'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function setFechaHoraAtribute($date){
        if (is_string($date))
            $this->attributes['fecha_hora'] = Carbon::parse($date);
    }
}
