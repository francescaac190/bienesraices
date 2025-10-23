<?php

function conectarBD(): mysqli
{
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');
    $db->set_charset('utf8');


    if (!$db) {
        echo 'Error no se puedo conectar';
        exit;
    }
    return $db;
}
