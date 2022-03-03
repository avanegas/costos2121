@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.generals.create')
        <a href="{{route('admin.generals.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo datos generales</a>
    @endcan
    <h1>Datos generales.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.generals-index')

@stop

