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
    <nav>
        <div class = "menu">
            <a href="Clothing" class = "barranav">Inicio</a>
            <a href="Clothing/GetClothing" class = "barranav">Ver todas</a>
            <a href="Categories" class = "barranav">Ver categorias</a>
            {if $auth}
                <a href="Clothing/AddClothingForm" class = "barranav">Agregar una nueva prenda</a>
                <a href="Categories/FormAddCategorie" class = "barranav">Agregar una nueva categoria</a>
                <a href="Logout" class = "barranav"">Cerrar sesión</a>
                {else} 
                <a href="Login" class = "barranav">Iniciar sesión|Registrarse</a>
            {/if}     
        </div>   
    </nav>
</body>
</html>