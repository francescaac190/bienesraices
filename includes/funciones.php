<?php

define('TEMPLATES_URL', __DIR__ . '/templates');

define('FUNCIONES_URL', __DIR__ . 'funciones.php');

define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(String $nombre, bool $inicio = false)
{
    include  TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado(): bool
{
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html): String
{
    $s = htmlspecialchars($html);
    return $s;
}

//validar un tipo de contenido
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos); //buscar un string o numero dentro de un arreglo
}


//muestra notificacion
function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
