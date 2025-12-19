<?php
require_once __DIR__ . "/../models/Evento.php";

$evento = new Evento();

/* GUARDAR NUEVO EVENTO */
if (isset($_POST['guardar'])) {
    $evento->guardar($_POST);
    header("Location: index.php?page=eventos");
    exit;
}

/* ACTUALIZAR EVENTO */
if (isset($_POST['actualizar'])) {
    $evento->actualizar($_POST);
    header("Location: index.php?page=eventos");
    exit;
}

/* ELIMINAR EVENTO */
if (isset($_GET['id'])) {
    $evento->eliminar($_GET['id']);
    header("Location: index.php?page=eventos");
    exit;
}

