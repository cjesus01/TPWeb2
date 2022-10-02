<?php
require_once './app/controllers/ClothingController.php';

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action=$_GET['action'];
}
else{
    $action='Clothing';
};

$params = explode('/', $action);

$controller = new ClothingController();

switch($params[0]){
    case 'Clothing':
        if(isset($params[1]) && $params[1]==='GetClothing'){
            if(!isset($params[2])){
                $controller->getClothes();
            }
            else{
                $controller->getJustOneClothes($params[2]);
            }
        }
        else{
            echo 'Pagina no encontrada.';
        }
    break;
    default:
    echo 'Error 404';
}