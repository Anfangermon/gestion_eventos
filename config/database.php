<?php
$host = "sql10.freesqldatabase.com"; // servidor de tu hosting
$user = "sql10813014";               // usuario de la DB
$password = "hSErf9Xw7b";            // contraseña
$database = "sql10813014";           // nombre de la base de datos

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database);

// Revisar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Para manejar acentos y caracteres especiales
$conexion->set_charset("utf8");
