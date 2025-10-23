<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//conectar db
$db = conectarBD();

use App\ActiveRecord;

ActiveRecord::setDB($db);
