<table class="table table-striped table-hover">
    <thead class="thead">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoría</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>
                    @if($producto->foto)
                        <img src="{{ asset('storage/productos/' . $producto->foto) }}" 
                             alt="{{ $producto->nombre }}" 
                             style="max-width: 80px;">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-success agregar-producto"
                        data-id="{{ $producto->_id }}"
                        data-nombre="{{ $producto->nombre }}"
                        data-precio="{{ $producto->precio }}">
                        Agregar
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>