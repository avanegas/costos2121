@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.permissions.create')
        <a href="{{route('admin.permissions.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo permiso</a>
    @endcan
    <h1>Permisos de rol.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.permissions-index')
@stop
