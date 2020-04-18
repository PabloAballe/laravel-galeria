

@extends('base')

@section('titulo')

Subir Foto

@endsection
@section('contenido')




  








<div class="container">


    <h1>Sube tus imagenes aqui</h1>
    <form action="{{ url('galeria') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


        {!! csrf_field() !!}


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ups</strong> Hay algun problema con tus datos<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        <div class="row" id="formulario">
            <div class="col-md-5">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" class="form-control" placeholder="Titulo">
            </div>
            <div class="col-md-5">
                <strong>Imagen:</strong>
                <input type="file" name="imagen" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button id="subir"type="submit" class="btn btn-primary">Subir</button>
            </div>
        </div>


    </form>

</div>
@endsection
