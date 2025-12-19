<?php
require_once __DIR__ . "/../config/database.php";

class Evento {

    /* ===================== LISTAR ===================== */
    public function listar() {
        global $conexion;
        return $conexion->query("SELECT * FROM eventos");
    }

    /* ===================== GUARDAR ===================== */
    public function guardar($data) {
        global $conexion;

        $titulo = $data['titulo'] ?? '';
        $fecha = $data['fecha'] ?? '';
        $hora = $data['hora'] ?? '';
        $zona_horaria = $data['zona_horaria'] ?? '';
        $descripcion = $data['descripcion'] ?? '';
        $repeticion = $data['repeticion'] ?? '';
        $recordatorio = $data['recordatorio'] ?? '';
        $clasificacion = $data['clasificacion'] ?? '';
        $id_ubicacion = !empty($data['id_ubicacion']) ? (int)$data['id_ubicacion'] : 'NULL';

        $sql = "INSERT INTO eventos
        (titulo, fecha, hora, zona_horaria, descripcion, repeticion, recordatorio, clasificacion, id_ubicacion)
        VALUES (
            '$titulo',
            '$fecha',
            '$hora',
            '$zona_horaria',
            '$descripcion',
            '$repeticion',
            '$recordatorio',
            '$clasificacion',
            $id_ubicacion
        )";

        $conexion->query($sql);
        $id_evento = $conexion->insert_id;

        $this->guardarInvitados($id_evento, $data['contactos'] ?? []);
    }

    /* ===================== INVITADOS ===================== */
    private function guardarInvitados($id_evento, $contactos) {
        global $conexion;

        if (empty($contactos)) return;

        foreach ($contactos as $id_contacto) {
            $id_contacto = (int)$id_contacto;
            $conexion->query(
                "INSERT INTO evento_contacto (id_evento, id_contacto)
                 VALUES ($id_evento, $id_contacto)"
            );
        }
    }

    public function obtenerInvitados($id_evento) {
    global $conexion;

    return $conexion->query(
        "SELECT c.id_contacto, c.saludo, c.nombre_completo
         FROM contactos c
         JOIN evento_contacto ec ON c.id_contacto = ec.id_contacto
         WHERE ec.id_evento = $id_evento"
    );
}

    /* ===================== ELIMINAR ===================== */
    public function eliminar($id) {
        global $conexion;
        $id = (int)$id;

        // Primero eliminar relaciones
        $conexion->query("DELETE FROM evento_contacto WHERE id_evento = $id");

        return $conexion->query(
            "DELETE FROM eventos WHERE id_evento = $id"
        );
    }

    /* ===================== EDITAR ===================== */
    public function obtenerPorId($id) {
        global $conexion;
        return $conexion->query(
            "SELECT * FROM eventos WHERE id_evento = $id"
        )->fetch_assoc();
    }

   public function actualizar($data) {
    global $conexion;

    $id = (int)$data['id_evento'];
    $titulo = $data['titulo'] ?? '';
    $fecha = $data['fecha'] ?? '';
    $hora = $data['hora'] ?? '';
    $zona_horaria = $data['zona_horaria'] ?? '';
    $descripcion = $data['descripcion'] ?? '';
    $repeticion = $data['repeticion'] ?? '';
    $recordatorio = $data['recordatorio'] ?? '';
    $clasificacion = $data['clasificacion'] ?? '';
    $id_ubicacion = $data['id_ubicacion'] ?? 'NULL';

    // Actualizar datos del evento
    $conexion->query(
        "UPDATE eventos SET
         titulo='$titulo',
         fecha='$fecha',
         hora='$hora',
         zona_horaria='$zona_horaria',
         descripcion='$descripcion',
         repeticion='$repeticion',
         recordatorio='$recordatorio',
         clasificacion='$clasificacion',
         id_ubicacion=$id_ubicacion
         WHERE id_evento=$id"
    );

    //  Eliminar relaciones anteriores (orden y limpieza)
    $conexion->query(
        "DELETE FROM evento_contacto WHERE id_evento = $id"
    );

    // Guardar relaciones nuevas
    $this->guardarInvitados($id, $data['contactos'] ?? []);
}
}


