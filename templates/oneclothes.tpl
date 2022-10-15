{include file= "header.tpl"}
<body>
  <div class="un_elemento">
    <ul>
          <li>Prenda:{$OneClothes->prenda}</li>
          <li>Sexo:{$OneClothes->sexo}</li>
          <li>Talla:{$OneClothes->talla}</li>
          <li>Color:{$OneClothes->color}</li>
          <li>Tipo de tela:{$OneClothes->tipo_de_tela}</li>
          <div class="acomodar_btn">
          {if $OneClothes->imagen_prenda!=NULL}
            <li>Imagen:</li>
            <img src="{$OneClothes->imagen_prenda}" alt="error">
          {/if}
          </div>
          <button class="boton_volver"><a href=Clothing/GetClothing>Volver</a></button>
    </ul>
  </div>
</body>

{include file= "footer.tpl"}