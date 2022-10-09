{include file = 'header.tpl'}
    <ul>
    {foreach from=$categories item=$Categorie}
        <li>{$Categorie->tipo_de_tela}</li>
        <button><a href="Clothing/DeleteCategorie/{$Categorie->id_tela}">Eliminar</a></button>
        <button><a href="Clothing/FormUpdateCategorie/{$Categorie->id_tela}">Modificar</a></button>
    {/foreach}
    </ul>
    {include file = 'filtercategoryform.tpl'}
{include file = 'footer.tpl'}