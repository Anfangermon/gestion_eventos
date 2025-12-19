<?php include "views/layout/header.php"; ?>

<h3>Bienvenido al Sistema de Gestión de Eventos</h3>
<p>Desde este sistema podrá registrar, gestionar y consultar eventos académicos.</p>

<div class="row">
  <div class="col-md-4">
    <a href="?page=eventos" class="btn btn-primary w-100">Gestionar Eventos</a>
  </div>
  <div class="col-md-4">
    <a href="?page=ubicaciones" class="btn btn-secondary w-100">Gestionar Ubicaciones</a>
  </div>
  <div class="col-md-4">
    <a href="?page=contactos" class="btn btn-success w-100">Gestionar Contactos</a>
  </div>
</div>

<?php include "views/layout/footer.php"; ?>
