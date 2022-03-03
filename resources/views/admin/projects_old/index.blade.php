@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <a href="{{route('admin.projects.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo proyecto</a>
    <h1>Proyectos.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.projects-index')
    
@stop

@section('css')
    
@stop

@section('js')
   
@stop