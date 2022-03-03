@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar precio unitario.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.precios.update', $precio) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.precios.partials.form')

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Actualizar') }}</button>
                    <a href="{{route('admin.precios.index')}}" class="btn btn-secondary btn-sm ml-1">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@endsection