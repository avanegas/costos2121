    <div class="form-group">
        <label for="name">{{ __('Nombre') }}</label>
        <div class="col-md">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Ingrese el nombre del post' name="name" value="{{ isset($post->name)?$post->name:old('name') }}" autocomplete=off autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="slug">{{ __('Slug') }}</label>
        <div class="col-md">
            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"  placeholder='Ingrese el slug del post'name="slug" value="{{ isset($post->slug)?$post->slug:old('name') }}" readonly>
            @error('slug')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="category_id">{{ __('Categoría') }}</label>
        <div class="col-md"> 
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Ingrese la categoria del post</option>
                @foreach ( $categories as $category)
                    <option value="{{ $category->id }}" @isset($post->category_id) @if($post->category_id === $category->id) selected @endif @endisset>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <p class="font-weight-bold @error('tags') is-invalid @enderror"> Etiquetas</p>
        @foreach ($tags as $key => $tag)
            <label class="mr-2">
                <input class="mr-1" name="tags[]" id="tags" type="checkbox" value="{{ $tag->id }}" @isset($post->tags) @if(in_array($tag->id, $post->tags->pluck('id')->toArray(), )) checked @endif @endisset>
                {{ $tag->name}}
            </label>
        @endforeach
        @error('tags')
            <br>
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0 font-weight-bold @error('status') is-invalid @enderror">Estado del post</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="DRAFT" @isset($post->status) {{ $post->status == "DRAFT" ? 'checked' : '' }} @endisset checked>
                    <label class="form-check-label font-weight-bold" for="DRAFT">
                        Borrador
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="PUBLISHED" @isset($post->status) {{ $post->status == "PUBLISHED" ? 'checked' : '' }} @endisset>
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
                @isset ($post->image)
                    <img id="picture" src="{{Storage::url($post->image->url)}}">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2020/02/06/20/01/university-library-4825366_960_720.jpg">    
                @endisset
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="file">Imagen que se mostrara en el post</label>
                <input type="file" name="file" id="file" accept="image/*" class="form-control-file @error('file') is-invalid @enderror">
                @error('file')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>
            <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis dolore officiis architecto laboriosam consequuntur vel et dolorum quidem odit deleniti numquam laudantium magnam, debitis inventore quod! Animi maxime dolor sit!</small>
        </div>
    </div>              

    <div class="form-group">
        <label for="excerpt">{{ __('Extracto') }}</label>
        <div class="col-md">
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="4">{{ isset($post->excerpt)?$post->excerpt:old('name') }}</textarea>
            @error('excerpt')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="body">{{ __('Cuerpo del post') }}</label>
        <div class="col-md">
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4">{{ isset($post->body)?$post->body:old('name') }}</textarea>
            @error('body')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>