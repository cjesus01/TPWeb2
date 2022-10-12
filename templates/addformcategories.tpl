{include file='header.tpl'}
    <form method="GET" action="Categories/AddCategories">
        <label for="categoria">Ingrese la categoria:</label>
        <input type="text" name="categoria">
        <label for="descripcion">Ingrese su descripcion:</label>
        <input type="text" name="descripcion"> 
        <label for="lavado">Ingrese el tipo de lavado:</label>
        <input type="text" name="lavado">
        <label for="temperatura">Ingrese la temperatura de lavado:</label>
        <input type="text" name="temperatura">

        <button type='submit'>Enviar</button>
    </form>

{include file='footer.tpl'}