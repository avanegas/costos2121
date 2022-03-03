@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.equipos.create')
        <a href="{{route('admin.equipos.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Equipo</a>
    @endcan
    <h1>Equipos.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.equipos-index')

@stop
