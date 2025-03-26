<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                   value="{{ old('nombre', $producto->nombre ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" 
                   value="{{ old('precio', $producto->precio ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" 
                   value="{{ old('cantidad', $producto->cantidad ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" 
                   value="{{ old('categoria', $producto->categoria ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" 
                   accept="image/*" onchange="previewImage(event)">
            
            <div class="mt-2" id="image-preview">
                @if(isset($producto) && $producto->foto)
                    <img src="{{ asset('storage/productos/' . $producto->foto) }}" 
                         alt="Imagen actual" 
                         class="img-thumbnail" 
                         style="max-width: 200px;"
                         id="current-image">
                @endif
                <img src="#" 
                     alt="Previsualización" 
                     class="img-thumbnail" 
                     style="max-width: 200px; display: none;"
                     id="new-preview">
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('new-preview');
        const current = document.getElementById('current-image');
        const file = event.target.files[0];
        
        if (file) {
            // Ocultar imagen actual si existe
            if (current) current.style.display = 'none';
            
            // Mostrar nueva previsualización
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            // Restaurar estado original
            preview.style.display = 'none';
            if (current) current.style.display = 'block';
        }
    }
</script>
@endpush