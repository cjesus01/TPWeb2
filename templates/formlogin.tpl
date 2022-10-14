{include file='header.tpl'}
    <form action="Login/In" method="post">
    <div class = "formulario">
        <label for="nombre">Ingrese nombre de usuario:</label>
        <input type="text" name="Nombre">
    </div>
        <div class = "formulario">
        <label for="contraseña">Ingrese su contraseña:</label>
        <input type="password" name="Contraseña">
        <button type="submit">Enviar</button>
    </div>
    </form>
    <p>¿No tenes usuario? ¡Registrate!</p>
    <button type="submit"><a href="Register">Registrarse</a></button>
    {if $auth===false}
    <p class="usuario_invalido">{$message}</p>
    {/if}
    
{include file='footer.tpl'}