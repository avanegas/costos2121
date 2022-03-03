@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Crear nueva categoría.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <div class="col-md">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug">{{ __('Slug') }}</label>
                    <div class="col-md">
                        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" readonly>
                        @error('slug')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Guardar') }}
                    </button>
                    <a href="{{route('admin.categories.index')}}" class="btn btn-secondary btn-sm ml-1"> Regresar</a>
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
