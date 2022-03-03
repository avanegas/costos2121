@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.posts.create')
        <a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo artículo</a>
    @endcan    
    <h1>Articulos (posts).</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.posts-index')
    
@stop