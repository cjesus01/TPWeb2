{include file = 'header.tpl'}
    {include file = 'filtercategoryform.tpl'}
    <ul>
    {foreach from=$categories item=$Category}
        <li>Tipo de tela: {$Category->tipo_de_tela}</li>
        <li>Descripción: {$Category->descripcion}</li>
        <li>Lavado: {$Category->lavado_de_tela}</li>
        <li>Temperatura(agua): {$Category->temperatura_de_lavado}</li>
        <button><a href="Clothing/DeleteCategorie/{$Category->id_tela}">Eliminar</a></button>
        <button><a href="Clothing/FormUpdateCategorie/{$Category->id_tela}">Modificar</a></button>
    {/foreach}
    </ul>
{include file = 'footer.tpl'}