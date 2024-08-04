<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="numero" class="form-label">{{ __('Numero') }}</label>
            <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero', $mesa?->numero) }}" id="numero" placeholder="Numero">
            {!! $errors->first('numero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="capacidad" class="form-label">{{ __('Capacidad') }}</label>
            <input type="text" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" value="{{ old('capacidad', $mesa?->capacidad) }}" id="capacidad" placeholder="Capacidad">
            {!! $errors->first('capacidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $mesa?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{ old('imagen', $mesa?->imagen) }}" id="imagen" placeholder="Imagen">
            {!! $errors->first('imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>