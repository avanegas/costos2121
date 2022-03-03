@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar grupo de obreros.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="mb-2 alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.grupo_obreros.update', $grupo_obrero) }}">
                @csrf
                @method('PUT')

                @include('admin.grupo_obreros.partials.form')

                <div class="text-center form-group">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Actualizar') }}</button>
                    <a href="{{route('admin.grupo_obreros.index')}}" class="ml-1 btn btn-secondary btn-sm">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop
