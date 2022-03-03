<div class="form-group">
    <label for="grupo_material_id">{{ __('Grupo') }}</label>
    <div class="col-md">
        <select name="grupo_material_id" id="grupo_material_id" class="form-control @error('grupo_material_id') is-invalid @enderror">
            <option value="">Ingrese el grupo</option>
            @foreach ( $grupo_materials as $grupo_material)
                <option value="{{ $grupo_material->id }}" @isset($material->grupo_material_id) @if($material->grupo_material_id === $grupo_material->id) selected @endif @endisset>{{ $grupo_material->name }}</option>
            @endforeach
        </select>
        @error('grupo_material_id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="name">{{ __('Material') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del material' name="name" value="{{ isset($material->name)?$material->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="unidad">{{ __('Unidad') }}</label>
    <div class="col-md">
        <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror" placeholder='Ingrese la unidad' name="unidad" value="{{ isset($material->unidad)?$material->unidad:old('unidad') }}">
        @error('unidad')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="precio">{{ __('Precio') }}</label>
    <div class="col-md">
        <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" placeholder='Ingrese el precio' name="precio" value="{{ isset($material->precio)?$material->precio:old('precio') }}">
        @error('precio')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
