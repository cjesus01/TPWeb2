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
        <a href="Clothing">Inicio</a>
        <a href="Clothing/GetClothing">Ver todas</a>
        <a href="Categories/Category">Ver categorias</a>
        {if $auth===true}
            <a href="Clothing/AddClothingForm">Agregar una nueva prenda</a>
            <a href="Categories/FormAddCategorie">Agregar una nueva categoria</a>
            <a href="Logout">Cerrar sesión</a>
            {else} 
            <a href="Login">Iniciar sesión|Registrarse</a>
        {/if}        
    </nav>
</body>
</html>