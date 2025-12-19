<?php
require_once __DIR__ . "/../config/database.php";

class Contacto {

    public function listar() {
        global $conexion;
        return $conexion->query("SELECT * FROM contactos");
    }

    public function guardar($data) {
        global $conexion;

        $foto = null;

        if (!empty($_FILES['foto']['name'])) {
            $nombre = time() . "_" . $_FILES['foto']['name'];
            $ruta = "public/uploads/contactos/" . $nombre;
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            $foto = $ruta;
        }

        $conexion->query("
            INSERT INTO contactos
            (saludo, nombre_completo, identificacion, correo, telefono, foto)
            VALUES (
                '{$data['saludo']}',
                '{$data['nombre_completo']}',
                '{$data['identificacion']}',
                '{$data['correo']}',
                '{$data['telefono']}',
                '$foto'
            )
        ");
    }

    public function eliminar($id) {
        global $conexion;
        $id = (int)$id;
        return $conexion->query(
            "DELETE FROM contactos WHERE id_contacto = $id"
        );
    }

    public function obtenerPorId($id) {
        global $conexion;
        return $conexion->query(
            "SELECT * FROM contactos WHERE id_contacto = $id"
        )->fetch_assoc();
    }

    public function actualizar($data) {
        global $conexion;

        $id = (int)$data['id_contacto'];
        $fotoSQL = "";

        // Si se sube una nueva foto, guardarla
        if (!empty($_FILES['foto']['name'])) {
            $nombre = time() . "_" . $_FILES['foto']['name'];
            $ruta = "public/uploads/contactos/" . $nombre;
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            $fotoSQL = ", foto='$ruta'";
        }

        $conexion->query("
            UPDATE contactos SET
             saludo='{$data['saludo']}',
             nombre_completo='{$data['nombre_completo']}',
             identificacion='{$data['identificacion']}',
             correo='{$data['correo']}',
             telefono='{$data['telefono']}'
             $fotoSQL
             WHERE id_contacto=$id
        ");
    }
}

