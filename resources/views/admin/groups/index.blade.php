@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.groups.create')
        <a class="btn btn-secondary float-right" href="{{route('admin.groups.create')}}">Nuevo grupo</a>
    @endcan
    <h1>Grupos de usuario.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.groups-index')
@stop