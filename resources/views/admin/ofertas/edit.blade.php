@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar oferta.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.ofertas.update', $oferta) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.ofertas.partials.form')

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Actualizar') }}</button>
                    <a href="{{route('admin.ofertas.index')}}" class="btn btn-secondary btn-sm ml-1">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script type="text/javascript" >
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#descripcion' ) )
            .catch( error => {
                console.error( error );
            } );

        //Cambiar imagen.
        document.getElementById("file").addEventListener('change', cambiarImagen);
            function cambiarImagen(event){
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
    </script>
@endsection
