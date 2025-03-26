<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="sesion_id" class="form-label">Sesión ID</label>
            <input type="text" name="sesion_id" id="sesion_id" class="form-control" value="{{ old('sesion_id', $carrito->sesion_id ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente ID</label>
            <input type="text" name="cliente_id" id="cliente_id" class="form-control" value="{{ old('cliente_id', $carrito->cliente_id ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="productos" class="form-label">Productos (JSON)</label>
            <textarea name="productos" id="productos" class="form-control" rows="3">{{ old('productos', $carrito->productos ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ old('total', $carrito->total ?? 0) }}">
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
