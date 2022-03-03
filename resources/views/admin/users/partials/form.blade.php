<div class="form-group">
    <p class="font-weight-bold @error('tags') is-invalid @enderror"> Roles:</p>
    @foreach ($roles as $key => $role)
        <label class="mr-2">
            <input class="mr-1" name="roles[]" id="roles" type="checkbox" value="{{ $role->id }}" @isset($user->roles) @if(in_array($role->id, $user->roles->pluck('id')->toArray(), )) checked @endif @endisset>{{ $role->name}}
        </label>
    @endforeach
    @error('roles')
        <br>
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
