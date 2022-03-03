<div class="form-group">
    <label for="zona_id">{{ __('Area de actividad') }}</label>
    <div class="col-md">
        <select name="zona_id" id="zona_id" class="form-control @error('zona_id') is-invalid @enderror">
            <option value="">Ingrese la zona</option>
            @foreach ( $zonas as $zona)
                <option value="{{ $zona->id }}" @isset($grupo_obrero->zona_id) @if($grupo_obrero->zona_id === $zona->id) selected @endif @endisset>{{ $zona->name }}</option>
            @endforeach
        </select>
        @error('zona_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="name">{{ __('Nombre') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del grupo' name="name" value="{{ isset($grupo_obrero->name)?$grupo_obrero->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="description">{{ __('Descripción') }}</label>
    <div class="col-md">
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"  placeholder='Ingrese la descripción para el grupo de obreros' name="description" value="{{ isset($grupo_obrero->description)?$grupo_obrero->description:old('decription') }}">
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
