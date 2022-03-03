@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1 class="px-2">Usuarios.</h1>
@stop

@section('content')
    @livewire('admin.users-index')  
@stop