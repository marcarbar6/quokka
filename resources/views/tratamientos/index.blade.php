@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tratamientos</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear tratamiento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        {!! Form::open(['route' => 'tratamientos.index', 'method' => 'get']) !!}
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                                <th>Descripcion</th>
                                <th>Unidades</th>
                                <th>Frecuencias</th>
                                <th>Instrucciones</th>
                                <th>Medicamentos</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($tratamientos as $tratamiento)


                                <tr>
                                    <td>{{ $tratamiento->fecha_inicio }}</td>
                                    <td>{{ $tratamiento->fecha_fin }}</td>
                                    <td>{{ $tratamiento->descripcion }}</td>
                                    <td>{{ $tratamiento->unidades }}</td>
                                    <td>{{ $tratamiento->frecuencia }}</td>
                                    <td>{{ $tratamiento->instrucciones }}</td>
                                    <td>{{ $tratamiento->medicamento->name }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.edit',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.destroy',$tratamiento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection