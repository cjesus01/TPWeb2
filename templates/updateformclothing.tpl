{include file='header.tpl'}
    <form method="get" action="Clothing/UpdateClothing/{$id}">
        <label for="prenda">Ingrese la prenda:</label>
        <input type="text" name="prenda" value={$prenda}>
        <label for="sexo">Ingrese al sexo perteneciente:</label>
        <input type="text" name="sexo" value={$sexo}>
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color" value={$color}>
        <label for="talla">Ingrese la talla perteneciente:</label>
        <input type="text" name="talla" value = {$talla}>
        <label for="category">Seleccione la categoria:</label>
        <select name="category">
            {foreach from=$categories item=$category}
            <option value="{$category->id_tela}">{$category->tipo_de_tela}</option>
            {/foreach}
        </select>
        <button type='submit'>Enviar</button>
    </form>
{include file='footer.tpl'}