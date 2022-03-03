@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.transportes.create')
        <a href="{{route('admin.transportes.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo transporte</a>
    @endcan
    <h1>Transportes.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.transportes-index')

@stop
