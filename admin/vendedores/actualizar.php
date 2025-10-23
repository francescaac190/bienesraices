<?php
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

//id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}
//obtener los datos del vendedor
$vendedor = Vendedor::find($id);

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //asignar los valores
    $args = $_POST['vendedor'];

    //sincronizar objeto en memoria con lo que el usuario escribio
    $vendedor->sincronizar($args);

    //validacion
    $errores = $vendedor->validar();

    // debuguear($vendedor);

    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error):  ?>
        <div class="alerta error"> <?php echo $error ?> </div>

    <?php endforeach; ?>
    <form class="formulario" method="POST">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>
        <input type="submit" value="Guardar Vendedor" class="boton boton-verde">
    </form>


</main>

<?php
incluirTemplate('footer');
?>