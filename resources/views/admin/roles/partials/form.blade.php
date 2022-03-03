    <div class="form-group">
        <label for="name">{{ __('Nombre') }}</label>
        <div class="col-md">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del rol' name="name" value="{{ isset($role->name)?$role->name:old('name') }}" autocomplete=off autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <p class="font-weight-bold @error('permissions') is-invalid @enderror"> Permisos</p>
        @foreach ($permissions as $key => $permission)
            <label class="mr-2">
                <input class="mr-1" name="permissions[]" id="permissions" type="checkbox" value="{{ $permission->id }}" @isset($role->permissions) @if(in_array($permission->id, $role->permissions->pluck('id')->toArray(), )) checked @endif @endisset> 
                {{ $permission->description}}
            </label>
        @endforeach
        @error('permissions')
            <br>
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>