@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Crear nueva área (zona).</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success mb-2">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.zonas.store') }}">

                @csrf
                <input id="user_id" type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <div class="col-md">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug">{{ __('Description') }}</label>
                    <div class="col-md">
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">
                        @error('description')
                          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Guardar') }}
                    </button>
                    <a href="{{route('admin.zonas.index')}}" class="btn btn-secondary btn-sm ml-1"> Regresar</a>
                </div>
            </form>
        </div>
    </div>

@stop