{include file='header.tpl'}
    <form action="LoginIn" method="post">
        <label for="nombre">Ingrese nombre de usuario</label>
        <input type="text" name="nombre">
        <label for="contraseña">Ingrese su contraseña</label>
        <input type="text" name="contraseña">
        <button type="submit">Enviar</button>
    </form>
    <p>¿No tenes usuario? ¡Registrate!</p>
    <button type="submit"><a href="Register">Registrarse</a></button>
{include file='footer.tpl'}