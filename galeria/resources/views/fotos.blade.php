@extends('base')
@section('titulo')

Tus Fotos

@endsection

@section('contenido')






<div class="row">
<div class='list-group gallery'>


        @if($imagenes->count())
            @foreach($imagenes as $imagen)
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="thumbnail fancybox" rel="ligthbox" href="/imagenes/{{ $imagen->imagen }}">
                    <img class="img-responsive" alt="" src="/imagenes/{{ $imagen->imagen }}" />
                    <div class='text-center'>
                        <small class='text-muted'>{{ $imagen->titulo }}</small>
                    </div>
                </a>
                <form action="{{ url('galeria',$imagen->id) }}" method="POST">
                <input type="hidden" name="_method" value="borrar">
                {!! csrf_field() !!}
                <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                </form>
            </div>
            @endforeach
        @endif


    </div>
</div>



@endsection
