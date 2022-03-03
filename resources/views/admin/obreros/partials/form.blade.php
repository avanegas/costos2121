<div class="form-group">
    <label for="grupo_obrero_id">{{ __('Grupo') }}</label>
    <div class="col-md">
        <select name="grupo_obrero_id" id="grupo_obrero_id" class="form-control @error('grupo_obrero_id') is-invalid @enderror">
            <option value="">Ingrese el grupo</option>
            @foreach ( $grupo_obreros as $grupo_obrero)
                <option value="{{ $grupo_obrero->id }}" @isset($obrero->grupo_obrero_id) @if($obrero->grupo_obrero_id === $grupo_obrero->id) selected @endif @endisset>{{ $grupo_obrero->name }}</option>
            @endforeach
        </select>
        @error('grupo_obrero_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="name">{{ __('obrero') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del obrero' name="name" value="{{ isset($obrero->name)?$obrero->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="jornalhora">{{ __('Jornal/Hora') }}</label>
    <div class="col-md">
        <input id="jornalhora" type="text" class="form-control @error('jornalhora') is-invalid @enderror"  placeholder='Ingrese la jornalhora del obrero'name="jornalhora" value="{{ isset($obrero->jornalhora)?$obrero->jornalhora:old('jornalhora') }}">
        @error('jornalhora')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="factor">{{ __('Factor') }}</label>
    <div class="col-md">
        <input id="factor" type="text" class="form-control @error('factor') is-invalid @enderror" placeholder='Ingrese la factor' name="factor" value="{{ isset($obrero->factor)?$obrero->factor:old('factor') }}">
        @error('factor')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
