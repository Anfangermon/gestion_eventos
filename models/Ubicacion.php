<?php
require_once __DIR__ . "/../config/database.php";

class Ubicacion {

    public function listar() {
        global $conexion;
        return $conexion->query("SELECT * FROM ubicaciones");
    }

    public function guardar($data) {
        global $conexion;

        $titulo = $data['titulo'] ?? '';
        $direccion = $data['direccion'] ?? '';

        $sql = "INSERT INTO ubicaciones (titulo, direccion)
                VALUES ('$titulo', '$direccion')";

        return $conexion->query($sql);
    }

    public function eliminar($id) {
        global $conexion;
        $id = (int)$id;
        return $conexion->query("DELETE FROM ubicaciones WHERE id_ubicacion = $id");
    }
    public function obtenerPorId($id) {
    global $conexion;
    return $conexion->query(
        "SELECT * FROM ubicaciones WHERE id_ubicacion = $id"
    )->fetch_assoc();
}

public function actualizar($data) {
    global $conexion;

    $conexion->query(
        "UPDATE ubicaciones SET
         titulo='{$data['titulo']}',
         direccion='{$data['direccion']}'
         WHERE id_ubicacion={$data['id_ubicacion']}"
    );
}

}
