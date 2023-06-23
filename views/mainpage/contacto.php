<form action="/contacto" method="POST">
    <fieldset class="formulario-contacto">
        <legend>Formulario de contacto</legend>
        <div class="inner-form">
            <label for="email">E-Mail</label>
            <input type="mail" id="email" name="email" placeholder="Tu Correo...">
        </div>
        <div class="inner-form">
            <label for="asunto">Motivo de Contacto</label>
            <input type="text" id="asunto" name="asunto" placeholder="Motivo de contacto">
        </div>
        <div class="inner-form">
            <label for="mensaje">Indícanos tu mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        </div>
        <input type="submit">
    </fieldset>
</form>