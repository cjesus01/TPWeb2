{include file= "header.tpl"}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>{$Title}</title>
    <base href = "{$BASE_URL}">
</head>
<body>
    <ul>
        {foreach from=$clothing item=$Clothes}
            <div class = "mostrar_por_categoria">
                <li>Prenda:{$Clothes->prenda}</li>
                <li>Tipo de tela:{$Clothes->tipo_de_tela}</li>
                <button><a href=Clothing/GetClothing/{$Clothes->id}>Ver detalles</a></button>
                {if $auth===true}
                <button><a href=Clothing/DeleteClothing/{$Clothes->id}>Eliminar</a></button>
                <button><a href=Clothing/FormUpdateClothing/{$Clothes->id}>Editar</a></button>
                {/if}
            </div>
        {/foreach}
    </ul>
</body>

{include file= "footer.tpl"}
