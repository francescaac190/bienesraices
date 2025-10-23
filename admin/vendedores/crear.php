<?php
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vendedor = new Vendedor($_POST['vendedor']);

    //validar campos vacios
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Registrar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error):  ?>
        <div class="alerta error"> <?php echo $error ?> </div>

    <?php endforeach; ?>
    <form action="/admin/vendedores/crear.php" class="formulario" method="POST">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>
        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>


</main>

<?php
incluirTemplate('footer');
?>