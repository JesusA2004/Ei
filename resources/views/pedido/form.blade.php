<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente ID</label>
            <input type="text" name="cliente_id" id="cliente_id" class="form-control" value="{{ old('cliente_id', $pedido->cliente_id ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ old('total', $pedido->total ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado', $pedido->estado ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="items" class="form-label">Ítems (JSON)</label>
            <textarea name="items" id="items" class="form-control" rows="3">{{ old('items', $pedido->items ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="envio" class="form-label">Envío (JSON)</label>
            <textarea name="envio" id="envio" class="form-control" rows="3">{{ old('envio', $pedido->envio ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="pago" class="form-label">Pago (JSON)</label>
            <textarea name="pago" id="pago" class="form-control" rows="3">{{ old('pago', $pedido->pago ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
