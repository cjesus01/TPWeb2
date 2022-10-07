{include file= "header.tpl"}

<body>
    <ul>
    {if isset($Category)}
        {foreach from=$Clothing item=$Clothes}
        {if $Clothes->tipo_de_tela == $Category}
            <li>Prenda:{$Clothes->prenda}</li>
            <li>{$Clothes->tipo_de_tela}</li>
           {/if}
    {/foreach}    
    </ul>
        {else}
        {foreach from=$clothing item=$Clothes}
            <li>Prenda:{$Clothes->prenda}</li>
            <li>{$Clothes->tipo_de_tela}</li>
            <button><a href=Clothing/GetClothing/{$Clothes->id}>Ver detalles</a></button>
            <button><a href=Clothing/DeleteClothing/{$Clothes->id}>Eliminar</a></button>
            <button><a href=Clothing/UpdateClothing/{$Clothes->id}>Editar</a></button>
        {/foreach}
    {/if}
</body>

{include file= "footer.tpl"}
