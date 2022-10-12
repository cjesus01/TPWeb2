    <form method="get" action="Clothing/filtercategoryform">
        <label for="category">Seleccione la categoria para ver las diferentes prendas pertenecientes a esta:</label>
        <select name="category">
        {foreach from=$categories item=$Category}
            <option value="{$Category->id_tela}">{$Category->tipo_de_tela}</option>
            {/foreach}
        </select>
        <button type=submit>Enviar</button>
    </form>