{include file = 'header.tpl'}
    <form method="post" action="Categories/UpdateCategories/{$id}" enctype="multipart/form-data">
    <div class="formulario">
        <label for="descripcion">Ingrese su descripcion:</label>
        <textarea name="descripcion" cols="30" rows="10">{$descripcion}</textarea>
    </div>
    <div class="formulario">
        <label for="lavado">Ingrese el tipo de lavado:</label>
        <textarea name="lavado" cols="30" rows="10">{$lavado}</textarea>
    </div>
    <div class="formulario">
        <label for="temperatura">Ingrese la temperatura de lavado:</label>
        <textarea name="temperatura" cols="30" rows="10">{$temperatura}</textarea>
    </div>
     <div class="formulario">
        <label for="imagen">Agregue la imagen:</label>
        <input type="file" name="imagen">
    </div>
    <div class="formulario">
        <label for="categoria">Ingrese la categoria:</label>
        <input type='text' name="categoria" value='{$categoria}'>
        <button type='submit'>Enviar</button>
    </div>
    </form>
{include file = 'footer.tpl'}