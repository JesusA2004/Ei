<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead style="background-color: #FFF9F0; border-bottom: 1px solid #97ACBA;">
            <tr>
                <th style="color: #404E5E;">Foto</th>
                <th style="color: #404E5E;">Nombre</th>
                <th style="color: #404E5E;">Descripción</th>
                <th style="color: #404E5E;">Precio</th>
                <th style="color: #404E5E;">Cantidad</th>
                <th style="color: #404E5E;">Categoría</th>
                <th style="color: #404E5E;">Acción</th>
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
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td style="color: #404E5E;">{{ $producto->nombre }}</td>
                    <td style="color: #404E5E;">{{ $producto->descripcion }}</td>
                    <td style="color: #404E5E;">
                        ${{ number_format($producto->precio, 2) }}
                    </td>
                    <td style="color: #404E5E;">{{ $producto->cantidad }}</td>
                    <td style="color: #404E5E;">{{ $producto->categoria }}</td>
                    <td>
                        <button type="button" class="btn btn-sm agregar-producto"
                                style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;"
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
</div>
