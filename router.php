<?php
require_once './app/controllers/ClothingController.php';
require_once './app/controllers/CategoriesController.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action=$_GET['action'];
}
else{
    $action='Clothing';
};

$params = explode('/', $action);
$controller = new ClothingController();
$controllerCategories = new CategoriesController(); 

switch($params[0]){
    case 'Clothing':
        if(isset($params[1])){
            if($params[1]==='GetClothing'){
                if(!isset($params[2])){
                    $controller->getClothes();
                }
                else{
                    $controller->getJustOneClothes($params[2]);
                }
            }
            else if ($params[1] === 'Categories'){
                $controllerCategories->getCategories();
            }
            else if($params[1]=== 'filtercategoryform'){
                $controller->getClothesByCategory();
            }
            else{
                $controller->Homepage();
            }
        }
        else{
            $controller->Homepage();
        }
    break;
    default:
    echo 'Error 404';
}