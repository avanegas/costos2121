@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.categories.create')
        <a href="{{route('admin.categories.create')}}" class="btn btn-secondary btn-sm float-right">Nueva categoría</a>
    @endcan
    <h1>Categorías de artículo.</h1>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.categories-index')
@stop