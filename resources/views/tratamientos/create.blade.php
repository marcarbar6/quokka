@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'tratamientos.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha de inicio de tratamiento') !!}


                            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha de fin de tratamiento') !!}


                            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripcion del tratamiento ') !!}


                            {!! Form::text('descripcion',null,['class'=>'form-control', 'required']) !!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('unidades', 'Unidades') !!}


                            <input type="Integer" id="unidades" name="unidades" class="form-control"/>


                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'Frecuencia de tratamiento') !!}


                            {!! Form::text('frecuencia',null,['class'=>'form-control', 'required']) !!}


                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Instrucciones del tratamiento') !!}


                            {!! Form::text('instrucciones',null,['class'=>'form-control', 'required']) !!}


                        </div>


                        <div class="form-group">
                            {!!Form::label('medicamento_id', 'Medicamento') !!}
                            <br>
                            {!! Form::select('medicamento_id', $medicamentos, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection