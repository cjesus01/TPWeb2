{include file='header.tpl'}
    <form method="post" action="Categories/AddCategories" enctype="multipart/form-data">
    <div class = "formulario">
        <label for="categoria">Ingrese la categoria:</label>
        <input type="text" name="categoria">
    </div>
    <div class = "formulario">
        <label for="descripcion">Ingrese su descripcion:</label>
        <input type="text" name="descripcion">
    </div> 
    <div class = "formulario">
        <label for="lavado">Ingrese el tipo de lavado:</label>
        <input type="text" name="lavado">
    </div>
     <div class="formulario">
        <label for="imagen">Agregue la imagen:</label>
        <input type="file" name="imagen">
    </div>
    <div class = "formulario">
        <label for="temperatura">Ingrese la temperatura de lavado:</label>
        <input type="text" name="temperatura">
        <button type='submit'>Enviar</button>
    </div>
    </form>

{include file='footer.tpl'}