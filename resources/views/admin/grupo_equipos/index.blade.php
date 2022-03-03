@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.grupo_equipos.create')
        <a href="{{route('admin.grupo_equipos.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Grupo de equipos</a>
    @endcan
    <h1>Grupos de equipos.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.grupo-equipos-index')

@stop
