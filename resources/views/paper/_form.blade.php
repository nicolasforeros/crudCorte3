@csrf

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$paper->name) }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="categorie_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

    <div class="col-md-6">
        <select class="form-control select" name="categorie_id" id="categorie_id">
            @foreach ($categories as $name=>$id)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('categorie_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

    <div class="col-md-6">
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$paper->description) }}" required>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="revision_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Revision') }}</label>

    <div class="col-md-6">
        <input id="revision_date" type="date" class="form-control @error('revision_date') is-invalid @enderror" name="revision_date" value="{{ old('revision_date',$paper->revision_date) }}" max="{{ date("Y-m-d") }}" required>

        @error('revision_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

    <div class="col-md-6">
        <select class="form-control select" name="state" id="state">
            
            <option value="publicado">Publicado</option>
            <option value="en revision">En revision</option>
            <option value="rechazado">Rechazado</option>
            
        </select>
        @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="pdf_url" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

    <div class="col-md-6">
        <input id="pdf_url" type="file" class="form-control @error('pdf_url') is-invalid @enderror" name="pdf_url" value="{{ old('pdf_url') }}" required>

        @error('pdf_url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Subir Articulo') }}
        </button>
        <a href="{{ URL::previous() }}" class="btn btn-primary">
            {{ __('Cancelar') }}
        </a>
    </div>
</div>