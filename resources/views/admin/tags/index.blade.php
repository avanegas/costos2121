@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.tags.create')
        <a href="{{route('admin.tags.create')}}" class="btn btn-secondary btn-sm float-right">Nueva etiqueta</a>
    @endcan
    <h1>Etiquetas de artículo.</h1>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.tags-index')
@stop