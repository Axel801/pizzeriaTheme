<form class="reservations pt-3 pr-lg-5">
  <input type="text" class="mb-3 form-control" name="name" placeholder="Nombre" required>
  <input type="datetime-local" name="fecha" placeholder="Fecha" required class="mb-3 form-control">
  <input type="email" class="mb-3 form-control" name="correo" placeholder="Correo" required>
  <input type="tel" name="telefono" placeholder="Télefono" class="mb-3 form-control" required>
  <textarea class="mb-3 form-control" name="mensaje" placeholder="Mensaje" required></textarea>
  <div class="mb-3 g-recaptcha" data-sitekey="6Lc1Uh4UAAAAAJDEU6T1EXn-Wx1mswNu0zc3YtGS"></div>
  <div class="text-left">
    <input type="submit" name="enviar" class="mb-3 btn btn-brand-primary btn-lg ">
  </div>
  <input type="hidden" value="1" name="oculto">
</form>
