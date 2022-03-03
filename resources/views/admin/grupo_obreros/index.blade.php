@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.grupo_obreros.create')
        <a href="{{route('admin.grupo_obreros.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Grupo de obreros</a>
    @endcan
    <h1>Grupos de mano de obra.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.grupo-obreros-index')

@stop
