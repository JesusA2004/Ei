@extends('layouts.barraL')

@section('template_title')
    @if($carrito->cliente_id)
        {{ __('Actualizar Carrito de') }} {{ $carrito->cliente->nombre ?? 'Cliente no encontrado' }}
    @else
        {{ __('Actualizar Carrito') }}
    @endif
@endsection

@section('panel-content')
<section class="content container-fluid">
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
                        
                        @include('carrito.form', [
                            'clienteActual' => $carrito->cliente_id,
                            'productosCarrito' => json_decode($carrito->productos, true),
                            'totalActual' => $carrito->total,
                            'clientes' => $clientes,
                            'productos' => $productos
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
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar datos existentes
        const productosIniciales = @json(json_decode($carrito->productos, true));
        let productosAgregados = productosIniciales.map(p => ({
            id_producto: p.id_producto,
            nombre: p.nombre,
            precio_unitario: Number(p.precio_unitario),
            cantidad: Number(p.cantidad)
        }));
        
        const selectCliente = document.getElementById('cliente_id');
        if(selectCliente) {
            selectCliente.value = @json($carrito->cliente_id);
        }

        const calcularTotal = () => {
            const total = productosAgregados.reduce((acc, producto) => acc + (producto.precio_unitario * producto.cantidad), 0);
            const totalRedondeado = Math.round(total * 100) / 100;
            document.getElementById('total-carrito').textContent = `$${totalRedondeado.toFixed(2)}`;
            document.getElementById('total-hidden').value = totalRedondeado.toFixed(2);
        };

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
            document.getElementById('productos').value = JSON.stringify(productosAgregados);
            calcularTotal();
        };

        document.querySelectorAll('.agregar-producto').forEach(btn => {
            btn.addEventListener('click', function(){
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = parseFloat(this.getAttribute('data-precio'));
                
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
            if(confirm('¿Estás seguro de eliminar este producto?')) {
                productosAgregados.splice(index, 1);
                actualizarLista();
            }
        }

        actualizarLista();
        calcularTotal();
    });
</script>
@endpush
