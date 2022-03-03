@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.zonas.create')
        <a class="btn btn-secondary float-right" href="{{route('admin.zonas.create')}}">Nueva zona</a>
    @endcan    
    <h1>Areas (zonas) de trabajo.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.zonas-index')
@stop