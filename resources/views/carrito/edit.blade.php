@extends('layouts.barraL')

@section('template_title')
    @if($carrito->cliente_id)
        {{ __('Actualizar Carrito de') }} {{ $carrito->cliente->nombre ?? 'Cliente no encontrado' }}
    @else
        {{ __('Actualizar Carrito') }}
    @endif
@endsection

@section('panel-content')
<section class="content container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: 1px solid #97ACBA;">
                <div class="card-header" style="background-color: #FFF9F0;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title" style="color: #404E5E; font-weight: 600;">{{ __('Actualizar Carrito') }}</h5>
                        <a class="btn btn-sm" 
                           style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;"
                           href="{{ route('carritos.index') }}"> {{ __('Volver') }}</a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #FFF9F0;">
                    <form method="POST" action="{{ route('carritos.update', $carrito->_id) }}" 
                          role="form" 
                          enctype="multipart/form-data"
                          id="edit-carrito-form">
                        @method('PUT')
                        @csrf
                        
                        {{-- Se incluye el mismo formulario parcial que en create, enviando los datos precargados mediante old() --}}
                        @include('carrito.form', [
                            'clienteActual'    => old('cliente_id', $carrito->cliente_id),
                            'productosCarrito' => old('productos', $carrito->productos),
                            'totalActual'      => old('total', $carrito->total),
                            'clientes'         => $clientes,
                            'productos'        => $productos
                        ])
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    // Precargamos el arreglo de productos usando old() o los datos del carrito.
    const productosIniciales = @json(old('productos', $carrito->productos));
    
    // Inicializamos la lista de productos (se asume que es un array con objetos que tienen id_producto, nombre, precio_unitario y cantidad).
    let productosAgregados = productosIniciales.map(p => ({
        id_producto: p.id_producto,
        nombre: p.nombre,
        precio_unitario: Number(p.precio_unitario),
        cantidad: Number(p.cantidad)
    }));

    // Precargar selección de cliente.
    const selectCliente = document.getElementById('cliente_id');
    if(selectCliente) {
        selectCliente.value = @json(old('cliente_id', $carrito->cliente_id));
    }

    // Calcula y actualiza el total del carrito.
    const calcularTotal = () => {
        const total = productosAgregados.reduce((acc, producto) => acc + (producto.precio_unitario * producto.cantidad), 0);
        const totalRedondeado = Math.round(total * 100) / 100;
        document.getElementById('total-carrito').textContent = `$${totalRedondeado.toFixed(2)}`;
        document.getElementById('total-hidden').value = totalRedondeado.toFixed(2);
    };

    // Actualiza la lista visualmente.
    const actualizarLista = () => {
        const lista = document.getElementById('lista-productos-agregados');
        lista.innerHTML = '';
        productosAgregados.forEach((item, index) => {
            const subtotal = item.precio_unitario * item.cantidad;
            lista.innerHTML += `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        ${item.nombre} 
                        <small class="text-muted">(Cantidad: ${item.cantidad} | $${item.precio_unitario.toFixed(2)} c/u)</small>
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
        // Actualizamos el campo oculto "productos" del formulario.
        document.getElementById('productos').value = JSON.stringify(productosAgregados);
        calcularTotal();
    };

    // Agregar producto desde la lista de productos.
    document.querySelectorAll('.agregar-producto').forEach(btn => {
        // Asignar listener sólo una vez para evitar múltiples prompts.
        if(!btn.dataset.listenerAttached) {
            btn.addEventListener('click', function(){
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = parseFloat(this.getAttribute('data-precio'));
                
                // Solicitar la cantidad una sola vez.
                const cantidadInput = prompt('Ingrese la cantidad', 1);
                if(cantidadInput !== null) {
                    const cantidad = parseInt(cantidadInput);
                    if(cantidad > 0) {
                        // Si el producto ya existe, incrementa la cantidad.
                        const indiceExistente = productosAgregados.findIndex(item => item.id_producto === id);
                        if (indiceExistente >= 0) {
                            productosAgregados[indiceExistente].cantidad += cantidad;
                        } else {
                            productosAgregados.push({
                                id_producto: id,
                                nombre: nombre,
                                precio_unitario: precio,
                                cantidad: cantidad
                            });
                        }
                        actualizarLista();
                    }
                }
            });
            btn.dataset.listenerAttached = "true";
        }
    });

    // Función para eliminar un producto de la lista.
    window.eliminarProducto = function(index) {
        if(confirm('¿Estás seguro de eliminar este producto del carrito?')) {
            productosAgregados.splice(index, 1);
            actualizarLista();
        }
    }

    actualizarLista();
    calcularTotal();

    // Validación al enviar el formulario: evitar que el carrito quede vacío.
    document.querySelector('form').addEventListener('submit', function(e) {
        if(productosAgregados.length === 0) {
            e.preventDefault();
            alert('Debe agregar al menos un producto al carrito.');
        }
    });
});
</script>
@endpush
