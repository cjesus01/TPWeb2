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
            else if($params[1]=== 'DeleteClothing'){
                if(!isset($params[2])){
                    $controller->getClothes();
                }
                else{
                    $controller->DeleteClothing($params[2]);
                }
            }
            else if ($params[1] === 'FormUpdateClothing'){
                if(isset($params[2])){
                    $controller->FormUpdateClothing($params[2]);
                }
                else{
                    $controller->Error('No se puede modificar intente nuevamente');
                }
            }
            else if($params[1]==='UpdateClothing'){
                if(isset($params[2])){
                    $controller->UpdateClothing($params[2]);
                }
                else{
                    $controller->Error('No se puede modificar intente nuevamente'); 
                }    
            }
            else if($params[1]==='FormAddCategorie'){
                $controllerCategories->FormAddCategories();
            }
            else if($params[1]==='AddCategories'){
                $controllerCategories->AddCategories();
            }
            else if($params[1]==='AddClothingForm'){
                $controller->AddClothingForm();
            }
            else if($params[1]==='AddClothing'){
                $controller->AddClothing();
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