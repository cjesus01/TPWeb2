{include file = 'header.tpl'}
    <ul>
    {foreach from=$categories item=$Categorie}
        <li>{$Categorie->tipo_de_tela}</li>
    {/foreach}
    </ul>
    <button><a href = "Clothing">Volver</a></button>
{include file = 'footer.tpl'}