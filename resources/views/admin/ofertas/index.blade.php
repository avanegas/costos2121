@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    @can('admin.ofertas.create')
        <a href="{{route('admin.ofertas.create')}}" class="btn btn-secondary btn-sm float-right">Nueva oferta</a>
    @endcan
    <h1>Ofertas.</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.ofertas-index')

@stop
