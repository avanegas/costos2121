@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.servicios.create')
        <a href="{{route('admin.servicios.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo servicio</a>
    @endcan
    <h1>Servicios.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.servicios-index')

@stop