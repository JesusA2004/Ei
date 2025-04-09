<div class="container my-4">
    <div class="row">
        <!-- Primera fila: Nombre y Apellido -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nombre" class="form-label" style="color: #404E5E;">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" 
                       style="background-color: #FFF9F0; border-color: #97ACBA;"
                       value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="apellido" class="form-label" style="color: #404E5E;">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" 
                       style="background-color: #FFF9F0; border-color: #97ACBA;"
                       value="{{ old('apellido', $cliente->apellido ?? '') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Segunda fila: Correo y Teléfono -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="correo" class="form-label" style="color: #404E5E;">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" 
                       style="background-color: #FFF9F0; border-color: #97ACBA;"
                       value="{{ old('correo', $cliente->correo ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="telefono" class="form-label" style="color: #404E5E;">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" 
                style="background-color: #FFF9F0; border-color: #97ACBA;"
                value="{{ old('telefono', $cliente->telefono ?? '') }}"
                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            </div>
        </div>
    </div>

    <!-- Dirección (fila completa) -->
    <div class="mb-3">
        <label for="direccion" class="form-label" style="color: #404E5E;">Dirección</label>
        <textarea name="direccion" id="direccion" class="form-control" rows="3" 
                  style="background-color: #FFF9F0; border-color: #97ACBA;" required>{{ old('direccion', $cliente->direccion ?? '') }}</textarea>
    </div>

    <div class="row">
        <!-- Tercera fila: Usuario y Contraseña -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="usuario" class="form-label" style="color: #404E5E;">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" 
                       style="background-color: #FFF9F0; border-color: #97ACBA;"
                       value="{{ old('usuario', $cliente->usuario ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="contrasena" class="form-label" style="color: #404E5E;">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" 
                       style="background-color: #FFF9F0; border-color: #97ACBA;"
                       value="{{ old('contrasena', $cliente->contrasena ?? '') }}" required>
            </div>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <button type="submit" class="btn" 
                style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
            Enviar
        </button>
        <a href="{{ url()->previous() }}" class="btn" 
           style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;">
            ← Regresar
        </a>
    </div>
</div>
