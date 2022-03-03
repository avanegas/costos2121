<div class="form-group">
    <label for="zona_id">{{ __('Zona') }}</label>
    <div class="col-md">
        <select name="zona_id" id="zona_id" class="form-control @error('zona_id') is-invalid @enderror">
            <option value="">Ingrese la zona</option>
            @foreach ( $zonas as $zona)
                <option value="{{ $zona->id }}" @isset($transporte->zona_id) @if($transporte->zona_id === $zona->id) selected @endif @endisset>{{ $zona->name }}</option>
            @endforeach
        </select>
        @error('zona_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="name">{{ __('Transporte') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre' name="name" value="{{ isset($transporte->name)?$transporte->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="unidad">{{ __('unidad') }}</label>
    <div class="col-md">
        <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror"  placeholder='Ingrese la unidad'name="unidad" value="{{ isset($transporte->unidad)?$transporte->unidad:old('unidad') }}">
        @error('unidad')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="tipo">{{ __('Tipo') }}</label>
    <div class="col-md">
        <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" placeholder='Ingrese el tipo' name="tipo" value="{{ isset($transporte->tipo)?$transporte->tipo:old('tipo') }}">
        @error('tipo')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="tarifa">{{ __('Tarifa') }}</label>
    <div class="col-md">
        <input id="tarifa" type="text" class="form-control @error('tarifa') is-invalid @enderror" placeholder='Ingrese la tarifa' name="tarifa" value="{{ isset($transporte->tarifa)?$transporte->tarifa:old('tarifa') }}">
        @error('tarifa')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
