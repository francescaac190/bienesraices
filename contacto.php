<?php

require 'includes/app.php';
incluirTemplate('header');

?>


<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="imagen contacto" loading="lazy">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="" class="formulario">

        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre">

            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email">

            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"> </textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select name="" id="opciones">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu precio" id="presupuesto">
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado:</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto" type="radio" value="telefono" name="contacto" id="contactar-telefono">

                <label for="contactar-email">Email</label>
                <input name="contacto" type="radio" value="email" name="contacto" id="contactar-email">
            </div>

            <p>Si eligio telefono, elija fecha y hora</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" class="boton-verde" value="Enviar">

    </form>
</main>

<?php
incluirTemplate('footer');
?>