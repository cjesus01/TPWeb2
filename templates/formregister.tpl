{include file='header.tpl'}
    <form action="Register/AddUsser" method="post">
    <div class="formulario">
        <label for="nombre">Ingrese nombre de usuario:</label>
        <input type="text" name="nombre">
    </div>
    <div class="formulario">
        <label for="mail">Ingrese su mail:</label>
        <input type="text" name="mail">
    </div>
    <div class="formulario">
        <label for="contraseña">Ingrese su contraseña:</label>
        <input type="password" name="contraseña">
        <button type="submit">Enviar</button>
    </div>
    </form>
{include file='footer.tpl'}