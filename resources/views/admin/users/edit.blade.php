@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
        <p class="font-weight-bold ">Nombre: </p>
        <p class="form-control">{{$user->name}}</p>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.users.partials.form')

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm">{{ __('Actualizar') }}</button>
                <a href="{{route('admin.users.index')}}" class="btn btn-secondary btn-sm ml-1">{{ __('Regresar') }}</a>
            </div>
        </form>

        </div>
    </div>

@stop

@section('css')
  
@stop

@section('js')
 
@stop