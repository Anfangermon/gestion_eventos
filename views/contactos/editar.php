<?php
include "views/layout/header.php";
require_once "models/Contacto.php";

$model = new Contacto();
$id = $_GET['id'] ?? null;
$c = $model->obtenerPorId($id);
?>

<h4>Editar Contacto</h4>

<form method="post" action="index.php?page=actualizar_contacto" enctype="multipart/form-data">

  <input type="hidden" name="id_contacto" value="<?= $c['id_contacto'] ?>">

  <input type="text" name="saludo" class="form-control mb-2"
         value="<?= $c['saludo'] ?>" placeholder="Saludo (Sr., Sra., Ing.)" required>

  <input type="text" name="nombre_completo" class="form-control mb-2"
         value="<?= $c['nombre_completo'] ?>" placeholder="Nombre completo" required>

  <input type="text" name="identificacion" class="form-control mb-2"
         value="<?= $c['identificacion'] ?>" placeholder="Número de identificación">

  <input type="email" name="correo" class="form-control mb-2"
         value="<?= $c['correo'] ?>" placeholder="Correo electrónico">

  <input type="text" name="telefono" class="form-control mb-2"
         value="<?= $c['telefono'] ?>" placeholder="Teléfono">

  <?php if (!empty($c['foto'])): ?>
    <label>Foto actual:</label><br>
    <img src="<?= $c['foto'] ?>" alt="Foto" width="100" class="mb-2"><br>
  <?php endif; ?>

  <label>Actualizar foto</label>
  <input type="file" name="foto" class="form-control mb-2" accept="image/*">

  <button name="actualizar" class="btn btn-success">Actualizar</button>
  <a href="?page=contactos" class="btn btn-secondary">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>

