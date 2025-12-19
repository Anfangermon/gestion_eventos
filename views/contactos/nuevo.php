<?php include "views/layout/header.php"; ?>

<h4>Nuevo Contacto</h4>

<form method="post" action="index.php?page=guardar_contacto" enctype="multipart/form-data">

  <input type="text"
         name="saludo"
         class="form-control mb-2"
         placeholder="Saludo (Sr., Sra., Ing.)"
         required>

  <input type="text"
         name="nombre_completo"
         class="form-control mb-2"
         placeholder="Nombre completo"
         required>

  <input type="text"
         name="identificacion"
         class="form-control mb-2"
         placeholder="Número de identificación">

  <input type="email"
         name="correo"
         class="form-control mb-2"
         placeholder="Correo electrónico">

  <input type="text"
         name="telefono"
         class="form-control mb-2"
         placeholder="Teléfono">

  <label>Foto</label>
  <input type="file"
         name="foto"
         class="form-control mb-2"
         accept="image/*">

  <button name="guardar" class="btn btn-success">Guardar</button>
  <a href="?page=contactos" class="btn btn-secondary">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>
