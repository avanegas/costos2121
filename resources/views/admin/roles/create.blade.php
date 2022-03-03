@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.roles.store')}}">
                @csrf

                @include('admin.roles.partials.form')

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">{{ __('Guardar') }}</button>
                    <a href="{{route('admin.roles.index')}}" class="btn btn-secondary btn-sm ml-1">{{ __('Regresar') }}</a>
                </div>
            </form>

        </div>
    </div>
@stop
