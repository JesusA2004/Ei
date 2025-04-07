<div class="mb-3">
    <label for="nombre" class="form-label" style="color: #404E5E;">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control"
           style="background-color: #FFF9F0; border-color: #97ACBA;"
           value="{{ old('nombre', $producto->nombre ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label" style="color: #404E5E;">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="3"
              style="background-color: #FFF9F0; border-color: #97ACBA;" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="precio" class="form-label" style="color: #404E5E;">Precio</label>
    <input type="number" step="0.01" name="precio" id="precio" class="form-control"
           style="background-color: #FFF9F0; border-color: #97ACBA;"
           value="{{ old('precio', $producto->precio ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="cantidad" class="form-label" style="color: #404E5E;">Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control"
           style="background-color: #FFF9F0; border-color: #97ACBA;"
           value="{{ old('cantidad', $producto->cantidad ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="categoria" class="form-label" style="color: #404E5E;">Categoría</label>
    <input type="text" name="categoria" id="categoria" class="form-control"
           style="background-color: #FFF9F0; border-color: #97ACBA;"
           value="{{ old('categoria', $producto->categoria ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="foto" class="form-label" style="color: #404E5E;">Foto</label>
    <input type="file" name="foto" id="foto" class="form-control"
           style="background-color: #FFF9F0; border-color: #97ACBA;" accept="image/*" onchange="previewImage(event)">
    
    <div class="mt-2" id="image-preview">
        @if(isset($producto) && $producto->foto)
            <img src="{{ asset('storage/productos/' . $producto->foto) }}" alt="Imagen actual" class="img-thumbnail"
                 style="max-width: 200px;" id="current-image">
        @endif
        <img src="#" alt="Previsualización" class="img-thumbnail"
             style="max-width: 200px; display: none;" id="new-preview">
    </div>
</div>
<div class="mb-3 text-end">
    <button type="submit" class="btn btn-primary me-2"
            style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
        {{ isset($producto) ? __('Actualizar producto') : __('Guardar producto') }}
    </button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary"
       style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;">
        Cancelar
    </a>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('new-preview');
        const current = document.getElementById('current-image');
        const file = event.target.files[0];
        
        if (file) {
            if (current) current.style.display = 'none';
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            if (current) current.style.display = 'block';
        }
    }
</script>
@endpush
