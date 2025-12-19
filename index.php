<?php
$page = $_GET['page'] ?? 'inicio';

switch ($page) {

    /* EVENTOS */
    case 'eventos':
        include "views/eventos/listar.php";
        break;

    case 'nuevo_evento':
        include "views/eventos/nuevo.php";
        break;

    case 'guardar_evento':
        include "controllers/eventosController.php";
        break;

    case 'eliminar_evento':
        include "controllers/eventosController.php";
        break;

    case 'editar_evento':
    include "views/eventos/editar.php";
    break;

    case 'actualizar_evento':
    include "controllers/eventosController.php";
    break;

    /* UBICACIONES */
    case 'ubicaciones':
        include "views/ubicaciones/listar.php";
        break;

    case 'nueva_ubicacion':
        include "views/ubicaciones/nuevo.php";
        break;

    case 'guardar_ubicacion':
        include "controllers/ubicacionesController.php";
        break;

    case 'eliminar_ubicacion':
        include "controllers/ubicacionesController.php";
        break;

        case 'editar_ubicacion':
    include "views/ubicaciones/editar.php";
    break;

case 'actualizar_ubicacion':
    include "controllers/ubicacionesController.php";
    break;

    /* CONTACTOS */
    case 'contactos':
        include "views/contactos/listar.php";
        break;

    case 'nuevo_contacto':
        include "views/contactos/nuevo.php";
        break;

    case 'guardar_contacto':
        include "controllers/contactosController.php";
        break;

    case 'eliminar_contacto':
        include "controllers/contactosController.php";
        break;
    
    case 'editar_contacto':
    include "views/contactos/editar.php";
    break;

case 'actualizar_contacto':
    include "controllers/contactosController.php";
    break;

    default:
        include "views/inicio.php";
}
