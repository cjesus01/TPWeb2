{include file='header.tpl'}
    <form action="LoginIn" method="post">
        <label for="nombre">Ingrese nombre de usuario:</label>
        <input type="text" name="nombre">
        <label for="mail">Ingrese su mail:</label>
        <input type="text" name="mail">
        <label for="contraseña">Ingrese su contraseña:</label>
        <input type="text" name="contraseña">
        <button type="submit">Enviar</button>
    </form>
{include file='footer.tpl'}