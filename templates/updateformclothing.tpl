{include file='header.tpl'}
    <form method="post" action="Clothing/UpdateClothing/{$id}" enctype="multipart/form-data">
    <div class="formulario">
        <label for="prenda">Ingrese la prenda:</label>
        <input type="text" name="prenda" value={$prenda}>
    </div>
    <div class="formulario">
        <label for="sexo">Ingrese al sexo perteneciente:</label>
        <input type="text" name="sexo" value={$sexo}>
    </div>
    <div class="formulario">
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color" value={$color}>
    </div>
    <div class="formulario">
        <label for="talla">Ingrese la talla perteneciente:</label>
        <input type="text" name="talla" value = {$talla}>
    </div>
    <div class="formulario">
        <label for="imagen">Ingrese la imagen:</label>
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