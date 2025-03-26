<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Campo oculto para el ID del usuario autenticado -->
        <input type="hidden" name="sesion_id" id="sesion_id" value="{{ Auth::id() }}">

        <!-- Seleccionar cliente -->
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Aquí se incluye la lista de productos -->
        @include('producto._list', ['productos' => $productos])

        <!-- Campo oculto para almacenar los productos agregados -->
        <input type="hidden" name="productos" id="productos" value="[]">

        <!-- Sección para mostrar los productos agregados -->
        <div id="lista-productos-agregados"></div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
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
                lista.innerHTML += `<p>${item.nombre} - Cantidad: ${item.cantidad} 
                    <button type="button" onclick="eliminarProducto(${index})">Eliminar</button></p>`;
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
