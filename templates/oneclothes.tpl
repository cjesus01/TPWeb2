{include file= "header.tpl"}
<body>
    <ul>
          <li>Prenda:{$OneClothes->prenda}</li>
          <li>Sexo:{$OneClothes->sexo}</li>
          <li>Talla:{$OneClothes->talla}</li>
          <li>Color:{$OneClothes->color}</li>
          <li>Tipo de tela:{$OneClothes->tipo_de_tela}</li>
          {if $OneClothes->imagen_prenda!=NULL}
            <li>Imagen:<img src="{$OneClothes->imagen_prenda}" alt="error"></li>
          {/if}
           <button><a href=Clothing/GetClothing>Volver</a></button>
    </ul>
</body>

{include file= "footer.tpl"}