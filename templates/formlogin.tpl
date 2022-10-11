{include file='header.tpl'}
    <form action="Login/In" method="post">
        <label for="nombre">Ingrese nombre de usuario:</label>
        <input type="text" name="Nombre">
        <label for="contraseña">Ingrese su contraseña:</label>
        <input type="text" name="Contraseña">
        <button type="submit">Enviar</button>
    </form>
    <div>
        <p>{$message}</p>
    <p>¿No tenes usuario? ¡Registrate!</p>
    <button type="submit"><a href="Register">Registrarse</a></button>
{include file='footer.tpl'}