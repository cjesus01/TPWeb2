{include file='header.tpl'}
    <form method="post" action="Clothing/AddClothing" enctype="multipart/form-data">
    <div class="formulario">
        <label for="prenda">Agregar la prenda:</label>
        <input type="text" name="prenda">
    </div>
    <div class="formulario">
        <label for="sexo">Agregar al sexo perteneciente:</label>
        <input type="text" name="sexo">
    </div>
    <div class="formulario">
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color">
    </div>
    <div class="formulario">
        <label for="talla">Agregar la talla perteneciente:</label>
        <input type="text" name="talla">
    </div>
    <div class="formulario">
        <label for="imagen">Agregue la imagen:</label>
        <input type="file" name="imagen">
    </div>
    <div class="formulario">
        <label for="category">Seleccione la categoria:</label>
        <select name="category">
        {foreach from=$categories item=$category}
            <option value="{$category->id_tela}">{$category->tipo_de_tela}</option>
        {/foreach}
        </select>
        <button type='submit'>Enviar</button>
    </div>
    </form>
{include file='footer.tpl'}