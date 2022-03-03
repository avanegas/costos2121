<div class="form-group">
    <label for="name">{{ __('Titulo') }}</label>
    <div class="col-md">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el titulo de la oferta' name="name" value="{{ isset($oferta->name)?$oferta->name:old('name') }}" autocomplete=off autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="slug">{{ __('Slug') }}</label>
    <div class="col-md">
        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"  placeholder='Ingrese el slug de la oferta'name="slug" value="{{ isset($oferta->slug)?$oferta->slug:old('slug') }}" readonly>
        @error('slug')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="unidad">{{ __('Unidad') }}</label>
    <div class="col-md">
        <input id="unidad" type="text" class="form-control @error('unidad') is-invalid @enderror" placeholder='Ingrese la unidad de medida' name="unidad" value="{{ isset($oferta->unidad)?$oferta->unidad:old('unidad') }}" autocomplete=off autofocus>
        @error('unidad')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="stock">{{ __('Stock') }}</label>
    <div class="col-md">
        <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" placeholder='Ingrese la stock de medida' name="stock" value="{{ isset($oferta->stock)?$oferta->stock:old('stock') }}" autocomplete=off autofocus>
        @error('stock')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="precio">{{ __('Precio') }}</label>
    <div class="col-md">
        <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" placeholder='Ingrese su costo' name="stock" value="{{ isset($oferta->precio)?$oferta->precio:old('precio') }}" autocomplete=off autofocus>
        @error('precio')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<fieldset class="form-group">
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0 font-weight-bold @error('status') is-invalid @enderror">Estado de la oferta</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="DRAFT" @isset($oferta->status) {{ $oferta->status == "DRAFT" ? 'checked' : '' }} @endisset checked>
                <label class="form-check-label font-weight-bold" for="DRAFT">
                    Borrador
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="PUBLISHED" @isset($oferta->status) {{ $oferta->status == "PUBLISHED" ? 'checked' : '' }} @endisset>
                <label class="form-check-label font-weight-bold" for="PUBLISHED">
                    Publicado
                </label>
            </div>
        </div>
    </div>
    @error('status')
        <br>
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</fieldset>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($oferta->image)
                <img id="picture" src="{{Storage::url($oferta->image->url)}}">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2020/02/06/20/01/university-library-4825366_960_720.jpg">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="file">Imagen que se mostrara.</label>
            <input type="file" name="file" id="file" accept="image/*" class="form-control-file @error('file') is-invalid @enderror">
            @error('file')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

        </div>
        <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis dolore officiis architecto laboriosam consequuntur vel et dolorum quidem odit deleniti numquam laudantium magnam, debitis inventore quod! Animi maxime dolor sit!</small>
    </div>
</div>

<div class="form-group">
    <label for="descripcion">{{ __('Descripción') }}</label>
    <div class="col-md">
        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4">{{ isset($oferta->descripcion)?$oferta->descripcion:old('descripcion') }}</textarea>
        @error('descripcion')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>