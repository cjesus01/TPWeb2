{include file= "header.tpl"}

<body>
    <ul>
        {foreach from=$clothing item=$Clothes}
            <li>Prenda:{$Clothes->prenda}</li>
            <li>{$Clothes->tipo_de_tela}</li>
            <button><a href=Clothing/GetClothing/{$Clothes->id}>Ver detalles</a></button>
            <button><a href=Clothing/DeleteClothing/{$Clothes->id}>Eliminar</a></button>
            <button><a href=Clothing/FormUpdateClothing/{$Clothes->id}>Editar</a></button>
        {/foreach}
    </ul>
</body>

{include file= "footer.tpl"}
