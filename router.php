<?php
require_once './app/controllers/ClothingController.php';
require_once './app/controllers/CategoriesController.php';
require_once 'app/controllers/UssersController.php';
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
$controllerUssers= new UssersController();


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
                    $controller->Error('No se puede modificar, intentelo nuevamente.');
                }
            }
            else if($params[1]==='UpdateClothing'){
                if(!isset($params[2])){
                    $controller->Error('No se puede modificar, intentelo nuevamente.'); 
                }
                else{
                    $controller->UpdateClothing($params[2]);
                }    
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
    case 'Categories':
        if(isset($params[1])){
            if($params[1]==='FormAddCategorie'){
                $controllerCategories->FormAddCategories();
            }
            else if($params[1]==='AddCategories'){
                $controllerCategories->AddCategories();
            }
            else if($params[1]=== 'filtercategoryform'){
                if(isset($params[2])){
                    $controller->getClothesByCategory($params[2]);
                }
                else{
                    $controller->getClothesByCategory();
                }    
            }
            else if($params[1]==='FormUpdateCategorie'){
                if(isset($params[2])){
                    $controllerCategories->FormUpdateCategories($params[2]);
                }
                else{
                    $controller->Error('No se puede acceder al formulario.');
                }
            }
            else if($params[1]==='UpdateCategories'){
                if(isset($params[2])){
                    $controllerCategories->UpdateCategories($params[2]);
                }
                else{
                    $controller->Error('No se puede modificar la categoria.');
                }
            }
            else if($params[1] === 'DeleteCategorie'){
                if(!isset($params[2])){
                    $controller->Error('No se puede eliminar, intente nuevamente.'); 
                }
                else{
                    $controllerCategories->DeleteCategory($params[2]);
                }  
            }
            else{
                $controllerCategories->getCategories();
            }
        }
        else{
            $controllerCategories->getCategories();
        }
        break;
    case 'Login':
        if(isset($params[1])){
            if($params[1]==='In'){
                $controllerUssers->LoginIn();
            }
            else{
                $controller->Error('No se puede acceder, intentelo de vuelta.'); 
            }
        }
        else{
            $controllerUssers->FormLogin();
        }
        break;
    case 'Register':    
        if(isset($params[1])){
           if($params[1]==='AddUsser'){
                $controllerUssers->AddUsser();
            }
            else{
                $controller->Error('No se puede registrar, intentelo de vuelta.'); 
            }
        }
        else{
            $controllerUssers->FormRegister();
        }
        break;
    case 'Logout':
        $controllerUssers->Logout();
        break;
    default:
    $controller->Error('Error 404'); 

}