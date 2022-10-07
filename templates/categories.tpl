{include file = 'header.tpl'}
    <ul>
    {foreach from=$categories item=$Categorie}
        <li>{$Categorie->tipo_de_tela}</li>
    {/foreach}
    </ul>
    {include file = 'filtercategoryform.tpl'}
{include file = 'footer.tpl'}