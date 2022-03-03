@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.indices.create')
        <a href="{{route('admin.indices.create')}}" class="btn btn-secondary btn-sm float-right">Nuevos indices</a>
    @endcan
    <h1>Indices.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.indices-index')

@stop

