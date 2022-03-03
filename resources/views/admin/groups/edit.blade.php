@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar grupo</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.groups.update', $group) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <div class="col-md">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $group->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Actualizar') }}
                    </button>
                    <a href="{{route('admin.groups.index')}}" class="btn btn-secondary btn-sm ml-1"> Regresar</a>
                </div>
            </form>
        </div>
    </div>
@stop