{include file = 'header.tpl'}
    <form method="GET" action="Clothing/UpdateCategories/{$id}">
        <label for="descripcion">Ingrese su descripcion:</label>
        <textarea name="descripcion" cols="30" rows="10">{$descripcion}</textarea>
        <label for="lavado">Ingrese el tipo de lavado:</label>
        <textarea name="descripcion" cols="30" rows="10">{$lavado}</textarea>
        <label for="temperatura">Ingrese la temperatura de lavado:</label>
        <textarea name="descripcion" cols="30" rows="10">{$temperatura}</textarea>
        <label for="categoria">Ingrese la categoria:</label>
        <select name="categoria">
            {foreach from=$categories item=$category}
            <option value="{$category->tipo_de_tela}">{$category->tipo_de_tela}</option>
            {/foreach}
        </select>
        <button type='submit'>Enviar</button>

    </form>
{include file = 'footer.tpl'}