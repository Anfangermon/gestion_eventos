<?php
include "views/layout/header.php";
require_once "models/Ubicacion.php";

$ubicacionModel = new Ubicacion();
$id = $_GET['id'] ?? null;
$ubicacion = $ubicacionModel->obtenerPorId($id);
?>

<h4>Editar Ubicación</h4>

<form method="post" action="index.php?page=actualizar_ubicacion">

  <input type="hidden" name="id_ubicacion" value="<?= $ubicacion['id_ubicacion'] ?>">

  <input type="text" name="titulo" class="form-control mb-2"
         value="<?= $ubicacion['titulo'] ?>" required>

  <input type="text" name="direccion" class="form-control mb-2"
         value="<?= $ubicacion['direccion'] ?>" required>

  <button name="actualizar" class="btn btn-success">Actualizar</button>
  <a href="?page=ubicaciones" class="btn btn-secondary">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>
