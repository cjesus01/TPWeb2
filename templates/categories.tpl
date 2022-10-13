{include file = 'header.tpl'}

    <form method="get" action="Categories/filtercategoryform">
        <label for="category">Seleccione la categoria para ver las diferentes prendas pertenecientes a esta:</label>
        <select name="category">
        {foreach from=$categories item=$Category}
            <option value="{$Category->id_tela}">{$Category->tipo_de_tela}</option>
        {/foreach}
        </select>
        <button type=submit>Enviar</button>
    </form>
    <ul>
    {foreach from=$categories item=$Category}
        <li>Tipo de tela: {$Category->tipo_de_tela}</li>
        <li>Descripción: {$Category->descripcion}</li>
        <li>Lavado: {$Category->lavado_de_tela}</li>
        <li>Temperatura(agua): {$Category->temperatura_de_lavado}</li>
        {if $auth===true}
            <button><a href="Categories/DeleteCategorie/{$Category->id_tela}">Eliminar</a></button>
            <button><a href="Categories/FormUpdateCategorie/{$Category->id_tela}">Modificar</a></button>
        {/if}
    {/foreach}
    </ul>
{include file = 'footer.tpl'}