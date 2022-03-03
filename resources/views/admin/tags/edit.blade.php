@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.tags.update',$tag) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <div class="col-md">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $tag->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug">{{ __('Slug') }}</label>
                    <div class="col-md">
                        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"  value="{{ $tag->slug }}" readonly>
                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">{{ __('Color') }}</label>
                    <div class="col-md">
                        <select name="color" id="" class="form-control">
                            <option value="gray" @if($tag->color === 'gray') selected='selected' @endif>Gris</option>
                            <option value="teal" @if($tag->color === 'teal') selected='selected' @endif>Cafe</option>
                            <option value="green" @if($tag->color === 'green') selected='selected' @endif>Verde</option>
                            <option value="yellow" @if($tag->color === 'yellow') selected='selected' @endif>Amarillo</option>
                            <option value="pink" @if($tag->color === 'pink') selected='selected' @endif>Rosado</option>
                            <option value="orange" @if($tag->color === 'orange') selected='selected' @endif>Naranja</option>
                            <option value="red" @if($tag->color === 'red') selected='selected' @endif>Rojo</option>
                            <option value="purple" @if($tag->color === 'purple') selected='selected' @endif>Morado</option>
                            <option value="indigo" @if($tag->color === 'indigo') selected='selected' @endif>Añil</option>
                            <option value="blue" @if($tag->color === 'blue') selected='selected' @endif>Azul</option>
                        </select>
                        @error('color')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Guardar') }}
                    </button>
                    <a href="{{route('admin.tags.index')}}" class="btn btn-secondary btn-sm ml-1"> Regresar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"/>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script type="text/javascript" >
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
