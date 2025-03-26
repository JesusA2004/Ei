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
        
        <!-- Aquí se incluye la lista de productos -->
        @include('producto._list', ['productos' => $productos])
        
        <!-- Campo oculto para almacenar el JSON de productos agregados -->
        <input type="hidden" name="productos" id="productos" value="[]">
        
        <!-- Sección para listar los productos agregados -->
        <div id="lista-productos-agregados"></div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        let productosAgregados = [];
        
        const actualizarLista = () => {
            const lista = document.getElementById('lista-productos-agregados');
            lista.innerHTML = '';
            productosAgregados.forEach((item, index) => {
                lista.innerHTML += `<p>${item.nombre} - Cantidad: ${item.cantidad} <button type="button" onclick="eliminarProducto(${index})">Eliminar</button></p>`;
            });
            document.getElementById('productos').value = JSON.stringify(productosAgregados);
        }
        
        document.querySelectorAll('.agregar-producto').forEach(btn => {
            btn.addEventListener('click', function(){
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = parseFloat(this.getAttribute('data-precio'));
                
                // Solicitar cantidad
                const cantidad = prompt('Ingrese la cantidad', 1);
                if(cantidad && parseInt(cantidad) > 0) {
                    productosAgregados.push({
                        id_producto: id,
                        nombre: nombre,
                        precio_unitario: precio,
                        cantidad: parseInt(cantidad)
                    });
                    actualizarLista();
                }
            });
        });
        
        window.eliminarProducto = function(index) {
            productosAgregados.splice(index, 1);
            actualizarLista();
        }
    });
</script>
@endpush
