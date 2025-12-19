<?php
include "views/layout/header.php";
require_once "models/Evento.php";
require_once "models/Contacto.php";

$eventoModel = new Evento();
$contactoModel = new Contacto();

$id = $_GET['id'] ?? null;
$evento = $eventoModel->obtenerPorId($id);
$contactos = $contactoModel->listar();

// Invitados ya asociados
$invitadosActuales = [];
$result = $eventoModel->obtenerInvitados($id);
while ($i = $result->fetch_assoc()) {
    $invitadosActuales[] = $i['id_contacto'] ?? null;
}
?>

<h4>Editar Evento</h4>

<form method="post" action="index.php?page=actualizar_evento">

  <input type="hidden" name="id_evento" value="<?= $evento['id_evento'] ?>">

  <input type="text" name="titulo" class="form-control mb-2"
         value="<?= $evento['titulo'] ?>" required>

  <input type="date" name="fecha" class="form-control mb-2"
         value="<?= $evento['fecha'] ?>" required>

  <input type="time" name="hora" class="form-control mb-2"
         value="<?= $evento['hora'] ?>" required>

  <textarea name="descripcion" class="form-control mb-2"><?= $evento['descripcion'] ?></textarea>

  <label>Invitados</label>
  <?php while ($c = $contactos->fetch_assoc()): ?>
    <div>
      <input type="checkbox" name="contactos[]"
             value="<?= $c['id_contacto'] ?>"
             <?= in_array($c['id_contacto'], $invitadosActuales) ? 'checked' : '' ?>>
      <?= $c['saludo'] . ' ' . $c['nombre_completo'] ?>
    </div>
  <?php endwhile; ?>

  <button name="actualizar" class="btn btn-success mt-3">Actualizar</button>
  <a href="?page=eventos" class="btn btn-secondary mt-3">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>
