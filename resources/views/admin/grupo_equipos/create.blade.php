@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Crear Grupo de equipos.</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.grupo_equipos.store')}}">
                @csrf

                @include('admin.grupo_equipos.partials.form')

                <div class="text-center form-group">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Guardar') }}</button>
                    <a href="{{route('admin.grupo_equipos.index')}}" class="ml-1 btn btn-secondary btn-sm">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop
