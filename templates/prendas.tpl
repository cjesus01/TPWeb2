<body>
    <ul>
        {foreach from=$prendas item=$Clothes}
            <li>Prenda:{$Clothes->prenda}</li>
            <li>{$Clothes->tipo_de_tela}</li>
           <button><a href=Clothing/GetClothing{$Clothes->id}>Ver detalles</a></button>
        {/foreach}
    </ul>
</body>
