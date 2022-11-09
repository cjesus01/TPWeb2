<?php
    require_once './libs/Router.php';
    require_once './api/ApiClothingController.php';
    require_once './api/CategoriesApiController.php';

    $router = new Router();

    $router->addRoute('Clothing', 'GET', 'ApiClothingController', 'getClothing');
    $router->addRoute('Clothing/:ID','GET','ApiClothingController','getClothes');
    $router->addRoute('Clothing', 'POST', 'ApiClothingController', 'addClothing');
    $router->addRoute('Clothing/:ID', 'DELETE', 'ApiClothingController', 'deleteClothing'); 
    $router->addRoute('Clothing/:ID', 'PUT', 'ApiClothingController', 'updateClothing');

    $router->addRoute('Categories', 'GET', 'CategoriesApiController', 'getCategories');
    $router->addRoute('Categories/:ID','GET','CategoriesApiController','getCategory');
    $router->addRoute('Categories', 'POST', 'CategoriesApiController', 'addCategory');
    $router->addRoute('Categories/:ID', 'DELETE', 'CategoriesApiController', 'deleteCategory'); 
    $router->addRoute('Categories/:ID', 'PUT', 'CategoriesApiController', 'updateCategory');
    

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>