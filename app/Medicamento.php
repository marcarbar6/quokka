<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = ['name', 'composicion','presentacion','link'];

    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }
    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->presentacion;
    }
}
