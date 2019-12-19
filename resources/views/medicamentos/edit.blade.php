@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medico</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicamento, [ 'route' => ['medicamentos.update',$medicamento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del medicamento') !!}
                            {!! Form::text('name',$medicamento->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composicion', 'Composicion del medicamento') !!}
                            {!! Form::text('composicion',$medicamento->composicion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentacion', 'Presentacion del medicamento') !!}
                            {!! Form::text('presentacion',$medicamento->presentacion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link del medicamento') !!}
                            {!! Form::text('link',$medicamento->link,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
