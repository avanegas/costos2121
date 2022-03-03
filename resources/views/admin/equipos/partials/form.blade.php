<div class="form-group">
    <label for="grupo_equipo_id">{{ __('Grupo') }}</label>
    <div class="col-md">
        <select name="grupo_equipo_id" id="grupo_equipo_id" class="form-control @error('grupo_equipo_id') is-invalid @enderror">
            <option value="">Ingrese el grupo</option>
            @foreach ( $grupo_equipos as $grupo_equipo)
                <option value="{{ $grupo_equipo->id }}" @isset($equipo->grupo_equipo_id) @if($equipo->grupo_equipo_id === $grupo_equipo->id) selected @endif @endisset>{{ $grupo_equipo->name }}</option>
            @endforeach
        </select>
        @error('grupo_equipo_id')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="name">{{ __('Equipo') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del equipo' name="name" value="{{ isset($equipo->name)?$equipo->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="marca">{{ __('Marca') }}</label>
    <div class="col-md">
        <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror"  placeholder='Ingrese la marca del equipo'name="marca" value="{{ isset($equipo->marca)?$equipo->marca:old('marca') }}">
        @error('marca')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="tipo">{{ __('Tipo') }}</label>
    <div class="col-md">
        <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" placeholder='Ingrese el tipo' name="tipo" value="{{ isset($equipo->tipo)?$equipo->tipo:old('tipo') }}">
        @error('tipo')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="tarifa">{{ __('Tarifa') }}</label>
    <div class="col-md">
        <input id="tarifa" type="text" class="form-control @error('tarifa') is-invalid @enderror" placeholder='Ingrese la tarifa' name="tarifa" value="{{ isset($equipo->tarifa)?$equipo->tarifa:old('tarifa') }}">
        @error('tarifa')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
