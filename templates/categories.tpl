{include file = 'header.tpl'}
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
    <form method="get" action="Categories/filtercategoryform">
        <label for="category">Seleccione la categoria para ver las diferentes prendas pertenecientes a esta:</label>
        <select name="category">
        {foreach from=$categories item=$Category}
            <option value="{$Category->id_tela}">{$Category->tipo_de_tela}</option>
        {/foreach}
        </select>
        <button type=submit class = "boton">Enviar</button>
    </form>
    <ul>
    {foreach from=$categories item=$Category}
        <div class = "mostrar_por_categoria">
            <li>Tipo de tela: {$Category->tipo_de_tela}</li>
            <li>Descripción: {$Category->descripcion}</li>
            <li>Lavado: {$Category->lavado_de_tela}</li>
            <li>Temperatura(agua): {$Category->temperatura_de_lavado}</li>
            {if isset($Category->imagen)}
                <li>Imagen:<img src="./imgs/categories/{$Category->imagen}" alt="error"></li>
            {/if}
            {if $auth===true}
                <button><a href="Categories/DeleteCategorie/{$Category->id_tela}">Eliminar</a></button>
                <button><a href="Categories/FormUpdateCategorie/{$Category->id_tela}">Modificar</a></button>
            {/if}
        </div>
    {/foreach}

    </ul>
</body>
{include file = 'footer.tpl'}