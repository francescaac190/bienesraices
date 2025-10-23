<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;


estaAutenticado();

$propiedad = new Propiedad;
//consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

// debuguear($vendedores);

// arreglo con mensaje de errores

$errores = Propiedad::getErrores();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST['propiedad']);

    //generar un nombre unico
    $nombreImg = md5(uniqid(rand(), true)) . ".jpg";


    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600); //maneja y guarda la imagen 
        $propiedad->setImage($nombreImg);
    }

    $errores = $propiedad->validar();



    //validar por errores
    if (empty($errores)) {

        //subida de archivos
        //crear carpeta

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //Guarda la imagen en el servidor
        $imagen->save(CARPETA_IMAGENES . $nombreImg);

        $propiedad->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error):  ?>
        <div class="alerta error"> <?php echo $error ?> </div>

    <?php endforeach; ?>

    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>


</main>

<?php
incluirTemplate('footer');
?>