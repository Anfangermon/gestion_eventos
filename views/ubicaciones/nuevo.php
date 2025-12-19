<?php include "views/layout/header.php"; ?>

<h4>Nueva Ubicación</h4>

<form method="post" action="index.php?page=guardar_ubicacion">

  <input type="text" name="titulo" class="form-control mb-2"
         placeholder="Nombre de la ubicación" required>

  <input type="text" name="direccion" class="form-control mb-2"
         placeholder="Dirección" required>

  <button class="btn btn-success">Guardar</button>
  <a href="index.php?page=ubicaciones" class="btn btn-secondary">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>
