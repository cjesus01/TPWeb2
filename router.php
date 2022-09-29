<?php
require_once './app/controllers/ClothingController.php';

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action=$_GET['action'];
}
else{
    $action='GetClothing';
};

$params = explode('/', $action);

$controller = new ClothingController();

switch($params[0]){
    case 'GetClothing':
        $controller->getClothes();
    break;
}