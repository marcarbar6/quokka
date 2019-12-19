<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
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
        //


        $medicamentos = Medicamento::all();

        return view('medicamentos/index')->with('medicamentos', $medicamentos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicamentos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255'
        ]);


        $medicamento = new Medicamento($request->all());
        $medicamento->save();



        flash('Medicamento creado correctamente');

        return redirect()->route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $medicamento = Medicamento::find($id);

        return view('medicamentos/edit')->with('medicamento', $medicamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'link' => 'required|max:255'
        ]);

        $medicamento = Medicamento::find($id);
        $medicamento->fill($request->all());

        $medicamento->save();

        flash('Medicamento modificado correctamente');

        return redirect()->route('medicamentos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicamento = Medicamento::find($id);
        $medicamento->delete();
        flash('Medicamento borrado correctamente');

        return redirect()->route('medicamentos.index');
    }

    public function destroyAll()
    {
        Medicamento::truncate();
        flash('Todos los medicamentos borrados correctamente');

        return redirect()->route('medicamentos.index');
    }
}
