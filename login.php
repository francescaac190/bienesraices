<?php

require 'includes/app.php';
$db = conectarBD();

//autenticar al usuario
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }

    if (!$password) {
        $errores[] = "La contraseña es obligatorio o no es valido";
    }

    if (empty($errores)) {
        //revisar si el usuario existe

        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            //revisar password
            $usuario = mysqli_fetch_assoc($resultado);

            //verificar password
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                //contrasena correcta
                session_start();

                //llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                header('Location: /admin/index.php');
            } else {
                $errores[] = "La contraseña es incorrecta";
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";
}

//incluye el header

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">

    <h2>Iniciar Sesion</h2>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">

            <?php echo $error; ?>
        </div>


    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Contraseña</legend>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Tu email" id="email" required>

            <label for="pasword">Contraseña</label>
            <input type="password" name="password" placeholder="Tu contraseña" id="pasword" required>

        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>



</main>

<?php
incluirTemplate('footer');
?>