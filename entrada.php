<?php

require 'includes/app.php';
incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Guia decoracion para tu hogar</h1>


    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpeg">
        <img src="build/img/destacada.jpg" alt="imagen propiedad" loading="lazy">

    </picture>

    <p class="informacion-meta">Escrito el: <span>20/20/24</span> por: <span>Admin</span></p>


    <div class="resumen-propiedad">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus soluta quidem incidunt tempora molestiae libero sequi sed totam adipisci, quis sint autem earum natus tenetur quam ex eius recusandae a!</p>
    </div>
</main>

<?php
incluirTemplate('footer');
?>