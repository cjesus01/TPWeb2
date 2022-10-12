{include file='header.tpl'}
    <form method="get" action="Clothing/AddClothing">
        <label for="prenda">Agregar la prenda:</label>
        <input type="text" name="prenda">
        <label for="sexo">Agregar al sexo perteneciente:</label>
        <input type="text" name="sexo">
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color">
        <label for="talla">Agregar la talla perteneciente:</label>
        <input type="text" name="talla">
        <label for="category">Seleccione la categoria:</label>
        <select name="category">
        {foreach from=$categories item=$category}
            <option value="{$category->id_tela}">{$category->tipo_de_tela}</option>
        {/foreach}
        </select>
        <button type='submit'>Enviar</button>
    </form>
{include file='footer.tpl'}