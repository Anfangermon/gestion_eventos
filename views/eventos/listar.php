<?php
include "views/layout/header.php";
require_once "models/Evento.php";

$eventoModel = new Evento();
$lista = $eventoModel->listar();
?>

<h4>Gestión de Eventos</h4>
<a href="?page=nuevo_evento" class="btn btn-primary mb-3">Nuevo Evento</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Título</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Invitados</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php if ($lista && $lista->num_rows > 0): ?>
    <?php while ($row = $lista->fetch_assoc()): ?>
      <tr>
        <td><?= $row['titulo'] ?></td>
        <td><?= $row['fecha'] ?></td>
        <td><?= $row['hora'] ?></td>

        <!-- INVITADOS -->
        <td>
          <?php
            $invitados = $eventoModel->obtenerInvitados($row['id_evento']);

            if ($invitados && $invitados->num_rows > 0) {
                while ($i = $invitados->fetch_assoc()) {
                    echo $i['saludo'] . ' ' . $i['nombre_completo'] . "<br>";
                }
            } else {
                echo "<em>Sin invitados</em>";
            }
          ?>
        </td>

        <!-- ACCIONES -->
        <td>
          <a href="index.php?page=editar_evento&id=<?= $row['id_evento'] ?>"
             class="btn btn-warning btn-sm">
             Editar
          </a>

          <a href="index.php?page=eliminar_evento&id=<?= $row['id_evento'] ?>"
             class="btn btn-danger btn-sm"
             onclick="return confirm('¿Está seguro de eliminar este evento?');">
             Eliminar
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="5" class="text-center">No hay eventos registrados</td>
    </tr>
  <?php endif; ?>

  </tbody>
</table>

<?php include "views/layout/footer.php"; ?>
