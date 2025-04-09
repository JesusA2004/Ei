<div class="row p-1 mt-4">
    <div class="col-12">
        <!-- Campos ocultos -->
        <input type="hidden" name="sesion_id" id="sesion_id" value="{{ Auth::id() }}">
        <input type="hidden" name="productos" id="productos" value="[]">
        <input type="hidden" name="total" id="total-hidden">

        <!-- Seleccionar cliente -->
        <div class="mb-3">
            <label for="cliente_id" class="form-label" style="color: #404E5E;">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Lista de productos (incluyendo el listado parcial de productos) -->
        @include('producto._list', ['productos' => $productos])

        <!-- Sección de productos agregados y total -->
        <div class="card mt-4" style="border: 1px solid #97ACBA; background-color: #FFF9F0;">
            <div class="card-body">
                <h5 class="card-title" style="color: #404E5E;">Resumen del Carrito</h5>
                <div id="lista-productos-agregados" class="mb-3"></div>
                <div class="border-top pt-3">
                    <h5 class="text-end" style="color: #404E5E;">
                        <strong>Total: </strong>
                        <span id="total-carrito">$0.00</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary" 
                style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
            {{ __('Enviar') }}
        </button>
        <a href="{{ url()->previous() }}" 
            class="btn btn-sm"
            style="
                background-color: #C7D3E0;       /* azul-lavanda */
                color: #404E5E;                  /* azul-oscuro */
                border: 1px solid #A0C4D6;       /* azul-helado */
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                font-weight: 500;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                transition: all 0.2s ease-in-out;
            "
            onmouseover="this.style.backgroundColor='#B5D2E1'"
            onmouseout="this.style.backgroundColor='#C7D3E0'">
            ← Volver
        </a>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        let productosAgregados = [];

        const calcularTotal = () => {
            let total = productosAgregados.reduce((acc, producto) => {
                const precio = Number(producto.precio_unitario);
                const cantidad = Number(producto.cantidad);
                return acc + (precio * cantidad);
            }, 0);

            const totalRedondeado = Math.round(total * 100) / 100;
            document.getElementById('total-carrito').textContent = `$${totalRedondeado.toFixed(2)}`;
            document.getElementById('total-hidden').value = totalRedondeado.toFixed(2);
        };

        const actualizarLista = () => {
            const lista = document.getElementById('lista-productos-agregados');
            lista.innerHTML = '';

            productosAgregados.forEach((item, index) => {
                const precio = Number(item.precio_unitario);
                const cantidad = Number(item.cantidad);
                const subtotal = precio * cantidad;

                lista.innerHTML += `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            ${item.nombre}
                            <small class="text-muted">(Cantidad: ${cantidad} | $${precio.toFixed(2)} c/u)</small>
                        </div>
                        <div>
                            <span class="text-success">$${subtotal.toFixed(2)}</span>
                            <button type="button" class="btn btn-sm btn-danger ms-2" onclick="eliminarProducto(${index})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
            });

            document.getElementById('productos').value = JSON.stringify(productosAgregados);
            calcularTotal();
        };

        // Agregar producto desde la lista
        document.querySelectorAll('.agregar-producto').forEach(btn => {
            btn.addEventListener('click', function(){
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = parseFloat(this.getAttribute('data-precio')).toFixed(2);

                const cantidadInput = prompt('Ingrese la cantidad', 1);
                const cantidad = parseInt(cantidadInput);

                if(cantidad && cantidad > 0 && !isNaN(cantidad)) {
                    // Si el producto ya existe, se actualiza la cantidad
                    const indiceExistente = productosAgregados.findIndex(item => item.id_producto === id);
                    if (indiceExistente >= 0) {
                        productosAgregados[indiceExistente].cantidad += cantidad;
                    } else {
                        productosAgregados.push({
                            id_producto: id,
                            nombre: nombre,
                            precio_unitario: Number(precio),
                            cantidad: cantidad
                        });
                    }
                    actualizarLista();
                }
            });
        });

        window.eliminarProducto = function(index) {
            if(confirm('¿Estás seguro de eliminar este producto del carrito?')) {
                productosAgregados.splice(index, 1);
                actualizarLista();
            }
        }

        // Validación antes de enviar el formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            if(productosAgregados.length === 0) {
                e.preventDefault();
                alert('Debe agregar al menos un producto al carrito.');
            }
        });
    });
</script>
@endpush
