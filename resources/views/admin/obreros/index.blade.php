@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.obreros.create')
        <a href="{{route('admin.obreros.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo obrero</a>
    @endcan
    <h1>Mano de obra.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.obreros-index')

@stop
