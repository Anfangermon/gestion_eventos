<?php
include "views/layout/header.php";
require_once "models/Contacto.php";

$contacto = new Contacto();
$lista = $contacto->listar();
?>

<h4>Gestión de Contactos</h4>

<a href="?page=nuevo_contacto" class="btn btn-primary mb-3">
    Nuevo Contacto
</a>

<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>Foto</th>
      <th>Saludo</th>
      <th>Nombre completo</th>
      <th>Identificación</th>
      <th>Correo</th>
      <th>Teléfono</th>
      <th style="width: 220px;">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($lista && $lista->num_rows > 0): ?>
      <?php while ($row = $lista->fetch_assoc()): ?>
      <tr>
        <td>
          <?php if (!empty($row['foto'])): ?>
            <img src="<?= htmlspecialchars($row['foto']) ?>" alt="Foto" width="50">
          <?php else: ?>
            -
          <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($row['saludo']) ?></td>
        <td><?= htmlspecialchars($row['nombre_completo']) ?></td>
        <td><?= htmlspecialchars($row['identificacion']) ?></td>
        <td><?= htmlspecialchars($row['correo']) ?></td>
        <td><?= htmlspecialchars($row['telefono']) ?></td>
        <td>
          <a href="index.php?page=editar_contacto&id=<?= $row['id_contacto'] ?>"
             class="btn btn-warning btn-sm">
             Editar
          </a>

          <a href="index.php?page=contactos&eliminar=<?= $row['id_contacto'] ?>"
             class="btn btn-danger btn-sm"
             onclick="return confirm('¿Eliminar contacto?');">
             Eliminar
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="7" class="text-center">
            No hay contactos registrados
        </td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php include "views/layout/footer.php"; ?>
