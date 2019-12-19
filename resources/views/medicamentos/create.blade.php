@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'medicamentos.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del medicamento') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composicion', 'Composicion del medicamento') !!}
                            {!! Form::text('composicion',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentacion', 'Presentacion del medicamento') !!}
                            {!! Form::text('presentacion',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link del medicamento') !!}
                            {!! Form::text('link',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection