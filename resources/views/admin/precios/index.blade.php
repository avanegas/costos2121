@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.precios.create')
        <a href="{{route('admin.precios.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo precio</a>
    @endcan    
    <h1>Precios unitarios.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.precios-index')
@stop

@section('css')
    
@stop

@section('js')
   
@stop