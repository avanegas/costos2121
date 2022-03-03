@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Usuarios activos.</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Resumen</h1>
        </div>
        <div class="card-body y-2">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item mb-3 shadow-lg">
                        <h4>{{ $user->name }} </h4>
                        <h6>{{ $user->roles()->pluck('name')->implode(', ') }}</h6>
                        <div>
                            <em class="mr-4">email: {{$user->email}}</em>
                            <em>Fecha de Ingreso: {{ $user->created_at->diffForHumans() }}</em>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
