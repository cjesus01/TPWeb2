{include file= "header.tpl"}
<body>
    <ul>
          <li>Prenda:{$OneClothes->prenda}</li>
          <li>Sexo:{$OneClothes->sexo}</li>
          <li>Talla:{$OneClothes->talla}</li>
          <li>Color:{$OneClothes->color}</li>
          <li>Tipo de tela:{$OneClothes->tipo_de_tela}</li>
           <button><a href=Clothing/GetClothing>Volver</a></button>
    </ul>
</body>

{include file= "footer.tpl"}