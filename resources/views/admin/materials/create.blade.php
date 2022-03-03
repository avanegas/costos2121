@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Crear material.</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.materials.store')}}">
                @csrf

                @include('admin.materials.partials.form')

                <div class="text-center form-group">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Guardar') }}</button>
                    <a href="{{route('admin.materials.index')}}" class="ml-1 btn btn-secondary btn-sm">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop
