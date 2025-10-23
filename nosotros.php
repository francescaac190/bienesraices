<?php

require 'includes/app.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Conoce Sobre Nosotros</h1>

    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
            </picture>
        </div>

        <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat reprehenderit quo accusamus adipisci possimus sit facere, at omnis, maiores ratione iure quisquam ut nisi tempore nam placeat, magni dolores? Officia.</p>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores iure quia earum itaque tenetur. Quam, nihil obcaecati labore dicta alias animi ipsa ut eaque ullam atque enim harum, iusto officiis.</p>
        </div>
    </div>
</main>

<section class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
        </div>
    </div>
</section>

<?php
incluirTemplate('footer');
?>