<?php

use App\Propiedad;

$propiedades = Propiedad::all();

if ($_SERVER['SCRIPT_NAME'] == '/index.php') {
    $propiedades = Propiedad::get(3);
} else {
    $propiedades = Propiedad::all();
}
// debuguear($propiedades);


?>
<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) { ?>

        <div class="anuncio">
            <picture>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio">$<?php echo $propiedad->precio; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="wc" loading="lazy">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento" loading="lazy">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio" loading="lazy">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">
                    Ver Propiedad
                </a>
            </div> <!-- contenido-anuncio -->
        </div><!--anuncio -->
    <?php } ?>

</div><!--.contenido-->