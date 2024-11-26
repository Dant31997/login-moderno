<div class="container mt-5" >
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h2 class="font-weight-bold text-primary">Formulario de PQRs</h2>
        <p class="text-dark">Por favor, completa el formulario con tus datos para procesar tu solicitud.</p>
    </div>
    <div class="">
       <a href="{{ route('consultapqr') }}" class="btn btn-primary consultar-pqr">Consulta de Petición</a>
    </div>

    <!-- Mensaje de Alerta -->  
    @if (isset($mensaje))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ $mensaje }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Formulario -->
    <form wire:submit.prevent="save" class="shadow p-4 rounded bg-gradient-primary text-white ">
        <!-- Nombre Completo -->
        <div class="mb-3">
            <label for="nombreCompleto" class="form-label font-weight-bold "><i class="fas fa-user"></i> Nombre
                Completo</label>
            <input type="text" id="nombreCompleto" wire:model.live="nombreCompleto" class="form-control"
                placeholder="Ingrese su nombre completo" required>
        </div>

        <!-- Número de Cuenta -->
        <div class="mb-3">
            <label for="numeroCuenta" class="form-label font-weight-bold"><i class="fas fa-credit-card"></i> Número de
                Cuenta</label>
            <input type="text" id="numeroCuenta" wire:model.live="numeroCuenta" class="form-control"
                placeholder="Ingrese su número de cuenta" required>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3">
            <label for="correo" class="form-label font-weight-bold"><i class="fas fa-envelope"></i> Correo
                Electrónico</label>
            <input type="email" id="correo" wire:model.live="correo" class="form-control"
                placeholder="Ingrese su correo electrónico" required>
        </div>

        <!-- Teléfono de Contacto -->
        <div class="mb-3">
            <label for="telefono" class="form-label font-weight-bold"><i class="fas fa-phone"></i> Teléfono de
                Contacto</label>
            <input type="text" id="telefono" wire:model.live="telefono" class="form-control"
                placeholder="Ingrese su número telefónico" required>
        </div>

        <!-- Tipo de Petición -->
        <div class="mb-3">
            <label for="tipoPeticion" class="form-label font-weight-bold"><i class="fas fa-question-circle"></i> Tipo de
                Petición</label>
            <select id="tipoPeticion" wire:model.live="tipoPeticion"
                class="form-select border-secondary bg-light text-secondary" required>
                <option value="">Seleccione una opción</option>
                <option value="Peticion">Petición</option>
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
            </select>
        </div>
        
        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label font-weight-bold"><i class="fas fa-pen"></i> Descripción</label>
            <textarea id="descripcion" wire:model.live="descripcion" class="form-control" rows="4"
                placeholder="Describa su petición" required></textarea>
        </div>

        <!-- Preferencia de Contacto -->
        <div class="mb-3">
            <label class="form-label font-weight-bold"><i class="fas fa-headset"></i> Preferencia de Contacto</label>
            <div class="form-check">
                <input type="radio" id="contactoCorreo" wire:model.live="preferenciaContacto" value="correo"
                    class="form-check-input" required>
                <label for="contactoCorreo" class="form-check-label">Correo Electrónico</label>
            </div>
            <div class="form-check">
                <input type="radio" id="contactoTelefono" wire:model.live="preferenciaContacto" value="telefono"
                    class="form-check-input" required>
                <label for="contactoTelefono" class="form-check-label">Llamada Telefónica</label>
            </div>
            <div class="form-check">
                <input type="radio" id="contactoTexto" wire:model.live="preferenciaContacto" value="texto"
                    class="form-check-input" required>
                <label for="contactoTexto" class="form-check-label">Mensaje de Texto</label>
            </div>
        </div>

        <!-- Consentimiento --> 
        <div class="mb-3 form-check">
            <input type="checkbox" id="consentimiento" wire:model.live="consentimiento" class="form-check-input"
                required>
            <label for="consentimiento" class="form-check-label">Acepto los <a href="#"
                    class="text-primary text-decoration-underline">términos y condiciones</a> y la <a href="#"
                    class="text-primary text-decoration-underline">política de privacidad</a>.</label>
        </div>

        <!-- Botón Guardar -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Enviar</button>
        </div>
    </form>
</div>
