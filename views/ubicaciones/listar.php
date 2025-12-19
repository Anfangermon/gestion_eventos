<?php
include "views/layout/header.php";
require_once "models/Ubicacion.php";

$model = new Ubicacion();
$lista = $model->listar();
?>

<h4>Gestión de Ubicaciones</h4>

<a href="?page=nueva_ubicacion" class="btn btn-primary mb-3">
    Nueva Ubicación
</a>

<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>Título</th>
      <th>Dirección</th>
      <th style="width: 200px;">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($lista && $lista->num_rows > 0): ?>
      <?php while ($row = $lista->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['titulo']) ?></td>
        <td><?= htmlspecialchars($row['direccion']) ?></td>
        <td>
          <a href="index.php?page=editar_ubicacion&id=<?= $row['id_ubicacion'] ?>"
             class="btn btn-warning btn-sm">
             Editar
          </a>

          <a href="index.php?page=eliminar_ubicacion&id=<?= $row['id_ubicacion'] ?>"
             class="btn btn-danger btn-sm"
             onclick="return confirm('¿Eliminar esta ubicación?');">
             Eliminar
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="3" class="text-center">
            No hay ubicaciones registradas
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php include "views/layout/footer.php"; ?>

