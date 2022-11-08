<?php
    require_once './libs/Router.php';
    require_once './app/controller/ApiClothingController.php';

    $router = new Router();

    $router->addRoute('Clothing', 'GET', 'ApiClothingController', 'getClothing');
    $router->addRoute('Clothing/:ID','GET','ApiClothingController','getClothes');
    $router->addRoute('Clothing', 'POST', 'ApiClothingController', 'addClothing');
    // $router->addRoute('Clothing', 'POST', 'ClothingController', 'addClothing');

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>