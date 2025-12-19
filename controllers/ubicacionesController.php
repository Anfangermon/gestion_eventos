<?php
require_once __DIR__ . "/../models/Ubicacion.php";

$ubicacion = new Ubicacion();

/* GUARDAR */
if (isset($_POST['guardar'])) {
    $ubicacion->guardar($_POST);
    header("Location: index.php?page=ubicaciones");
    exit;
}

/* ACTUALIZAR */
if (isset($_POST['actualizar'])) {
    $ubicacion->actualizar($_POST);
    header("Location: index.php?page=ubicaciones");
    exit;
}

/* ELIMINAR */
if (isset($_GET['id'])) {
    $ubicacion->eliminar($_GET['id']);
    header("Location: index.php?page=ubicaciones");
    exit;
}
