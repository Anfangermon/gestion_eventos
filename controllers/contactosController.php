<?php
require_once __DIR__ . "/../models/Contacto.php";

$contacto = new Contacto();

if (isset($_POST['guardar'])) {
    $contacto->guardar($_POST);
    header("Location: index.php?page=contactos");
}

if (isset($_GET['eliminar'])) {
    $contacto->eliminar($_GET['eliminar']);
    header("Location: index.php?page=contactos");
}
// ACTUALIZAR CONTACTO
if (isset($_POST['actualizar'])) {
    $contacto->actualizar($_POST);
    header("Location: index.php?page=contactos");
    exit;
}
