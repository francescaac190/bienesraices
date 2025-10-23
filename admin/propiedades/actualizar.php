<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;


estaAutenticado();


$id = $_GET['id'];

$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//obtener datos de prop
$propiedad = Propiedad::find($id);


//consultar para obtener vendedores
$vendedores = Vendedor::all();

// arreglo con mensaje de errores

$errores = Propiedad::getErrores();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //asignar los atibutos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //validacion
    $errores = $propiedad->validar();

    //subida archivo

    $nombreImg = md5(uniqid(rand(), true)) . ".jpg";


    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600); //maneja y guarda la imagen 
        $propiedad->setImage($nombreImg);
    }


    //revisar arreglo 

    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            //almacenar imagen
            $imagen->save(CARPETA_IMAGENES . $nombreImg);
        }
        $propiedad->guardar();
    }
}


incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error):  ?>
        <div class="alerta error"> <?php echo $error ?> </div>

    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>


</main>

<?php
incluirTemplate('footer');
?>