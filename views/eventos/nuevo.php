<?php 
include "views/layout/header.php";
require_once "models/Contacto.php";

$contacto = new Contacto();
$contactos = $contacto->listar();
?>

<h4>Nuevo Evento</h4>

<form method="post" action="index.php?page=guardar_evento">

  <input type="text"
         name="titulo"
         class="form-control mb-2"
         placeholder="Título del evento"
         required>

  <input type="date"
         name="fecha"
         class="form-control mb-2"
         required>

  <input type="time"
         name="hora"
         class="form-control mb-2"
         required>

  <select name="zona_horaria" class="form-control mb-2">
    <option value="">Seleccione zona horaria</option>
    <option value="UTC-5">UTC-5 Ecuador</option>
  </select>

  <textarea name="descripcion"
            class="form-control mb-2"
            placeholder="Descripción del evento"></textarea>

  <select name="repeticion" class="form-control mb-2">
    <option value="">Sin repetición</option>
    <option value="Diaria">Diaria</option>
    <option value="Semanal">Semanal</option>
  </select>

  <select name="recordatorio" class="form-control mb-2">
    <option value="">Sin recordatorio</option>
    <option value="10 minutos antes">10 minutos antes</option>
    <option value="1 hora antes">1 hora antes</option>
  </select>

  <select name="clasificacion" class="form-control mb-2">
    <option value="Académico">Académico</option>
    <option value="Administrativo">Administrativo</option>
  </select>

  <hr>
  <h6>Invitados</h6>

  <?php while ($c = $contactos->fetch_assoc()): ?>
    <div class="form-check">
      <input class="form-check-input"
             type="checkbox"
             name="contactos[]"
             value="<?= $c['id_contacto'] ?>">
      <label class="form-check-label">
        <?= $c['saludo'] . ' ' . $c['nombre_completo'] ?>
      </label>
    </div>
  <?php endwhile; ?>

  <br>

  <button type="submit" name="guardar" class="btn btn-success">Guardar</button>
  <a href="index.php?page=eventos" class="btn btn-secondary">Cancelar</a>

</form>

<?php include "views/layout/footer.php"; ?>
