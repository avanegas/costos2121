@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.grupo_materials.create')
        <a href="{{route('admin.grupo_materials.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Grupo de materiales</a>
    @endcan
    <h1>Grupos de materiales.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.grupo-materials-index')

@stop
