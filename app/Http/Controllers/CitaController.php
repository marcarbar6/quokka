<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = strtotime(date('Y-m-d\ H:i'));
       $citas = array();
       $citasT = Cita::all();

        foreach ($citasT as $cita){
            if(strtotime($cita->fecha_hora) >= $now){
                  array_push($citas,$cita);
            }
        }

        return view('citas/index',['citas'=>$citas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');


        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'localizacion'=> 'required|max:255',

        ]);


        $cita = new Cita($request->all());
        $fecha2=clone $cita->fecha_hora;
        $cita->fecha_fin = $fecha2->addMinutes($cita->duracion);
        if($cita->mismaEspecialidad()==TRUE){
            $cita->save();
            flash('Cita creada correctamente');
            return redirect()->route('citas.index');
        }else{
            return redirect()->route('citas.create');
        }







    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = strtotime(date('Y-m-d\ H:i'));
        $citas = array();
        $citasT = Cita::all();

        foreach ($citasT as $cita){
           if(strtotime($cita->fecha_hora) < $now){
               array_push($citas,$cita);
            }
        }

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'localizacion'=> 'required|max:255',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $fecha2=clone $cita->fecha_hora;
        $cita->fecha_fin = $fecha2->addMinutes($cita->duracion);
        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
