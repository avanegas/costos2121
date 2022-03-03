@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.indirectos.create')
        <a href="{{route('admin.indirectos.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo indirectos</a>
    @endcan
    <h1>indirectos.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.indirectos-index')

@stop

