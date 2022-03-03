@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.materials.create')
        <a href="{{route('admin.materials.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo Material</a>
    @endcan
    <h1>Materiales.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.materials-index')

@stop
