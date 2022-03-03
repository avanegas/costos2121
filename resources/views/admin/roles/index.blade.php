@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.roles.create')
        <a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo rol</a>
    @endcan
    <h1>Roles de usuario.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.roles-index')
@stop
