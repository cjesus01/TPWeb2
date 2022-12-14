<?php
require_once './app/views/CategoriesView.php';
require_once './app/views/ClothingView.php';
require_once './app/models/CategoriesModel.php';
require_once './app/models/ClothingModel.php';
require_once './app/helpers/AuthHelper.php';

class CategoriesController extends AuthHelper{
    private $model;
    private $view;
    private $viewClothing;
    private $modelClothing;
    private $Auth;

    public function __construct(){
        $this->model=new CategoriesModel();
        $this->view=new CategoriesView();
        $this->viewClothing=new ClothingVIew();
        $this->modelClothing=new ClothingModel();
        $this->Auth=new AuthHelper();
    }

    public function getCategories(){
        $Categories = $this->model->getCategoriesAll();
        $Auth=$this->Auth->CheckLoggedIn();
        $this->view->ShowCategories($Categories,$Auth);
    }
    
    public function FormAddCategories(){
        $auth = $this->Auth->CheckLoggedIn();
        if($auth){
            $this->view->ShowFormCategories($auth);
        }
        else{
            $this->viewClothing->ShowError('No se puede agregar categorias porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }
    public function AddCategories(){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
            if(isset($_POST['descripcion']) && isset($_POST['lavado']) &&
            isset($_POST['temperatura']) && isset($_POST['categoria']) && 
            !empty($_POST['descripcion']) && !empty($_POST['lavado']) &&
            !empty($_POST['temperatura']) && !empty($_POST['categoria']) && 
            !is_numeric($_POST['descripcion']) && !is_numeric($_POST['lavado']) && 
            !is_numeric($_POST['temperatura']) && !is_numeric($_POST['categoria'])){
                if($this->CheckCategories($_POST['categoria'])){
                    $descripcion=$_POST['descripcion'];
                    $lavado=$_POST['lavado'];
                    $temperatura=$_POST['temperatura'];
                    $category=$_POST['categoria'];
                    if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
                        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                            || $_FILES['imagen']['type'] == "image/png" ){
                            $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                            $this->model->AddCategory($descripcion, $lavado,$temperatura,$category,$img);
                            $this->viewClothing->ShowSuccess('Se agregó correctamente la categoria','Add Categories','Categories', $auth);
                        }
                        else{
                            $this->viewClothing->ShowError('El formato de la imagen no es válido. Ingrese uno diferente.',$auth);
                        }
                    }
                    else{
                        $this->viewClothing->ShowError('Se necesita que se agregue una foto para agregar correctamente la categoria.',$auth);
                    }
                }
                else{
                    $this->viewClothing->ShowError('Ya se encuentra cargada la categoria, ingrese una diferente.', $auth);   
                }
            }
            else{
                $this->viewClothing->ShowError('No se logró agregar la categoria, por favor verifique que todos los campos esten completos.', $auth);   
            }
        } 
        else{
            $this->viewClothing->ShowError('No se puede agregar categorias porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }        
    }
    private function uploadImage($image){
        $target = './imgs/categories/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
    public function FormUpdateCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        if($auth){
            if(is_numeric($id) && !empty($id)){
                if($this->Idparams($id)){
                    $Id=intval($id);
                    $category = $this->model->getCategoriesOne($id);
                    $categoria = $category->tipo_de_tela;
                    $descripcion = $category->descripcion;
                    $lavado = $category->lavado_de_tela;
                    $temperatura = $category->temperatura_de_lavado;
                    $this->view->ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura,$auth);
                }
                else{
                    $this->viewClothing->ShowError('Esta categoria no existe, por favor busque una que se encuentre en está página.',$auth);
                }
            }
            else{
                $this->viewClothing->ShowError('Ingrese un id válido.',$auth);
            }
        }
        else{
            $this->viewClothing->ShowError('No se puede modificar las categorias porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }
    public function UpdateCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        if($auth){
            if($this->Idparams($id)){
                if(isset($_POST['descripcion']) && isset($_POST['lavado']) &&
                isset($_POST['temperatura']) && isset($_POST['categoria']) && 
                !empty($_POST['descripcion']) && !empty($_POST['lavado']) &&
                !empty($_POST['temperatura']) && !empty($_POST['categoria']) && 
                !is_numeric($_POST['descripcion']) && !is_numeric($_POST['lavado']) && 
                !is_numeric($_POST['temperatura']) && !is_numeric($_POST['categoria'])){
                    if($this->CheckCategories($_POST['categoria'],$id)){
                        $descripcion = $_POST['descripcion'];
                        $lavado = $_POST['lavado'];
                        $temperatura = $_POST['temperatura'];
                        $categoria = $_POST['categoria'];
                        $Id=intval($id);
                        if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
                            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                                || $_FILES['imagen']['type'] == "image/png" ){
                                $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                                $this->model->UpdateCategories($categoria, $lavado, $temperatura, $descripcion, $Id,$img);
                                $this->viewClothing->ShowSuccess('Se modificó con éxito la categoria.', 'Update categories','Categories', $auth);
                            }
                            else{
                                $this->viewClothing->ShowError('El formato de la imagen no es válido. Ingrese uno diferente.',$auth);
                            }
                        }
                        else {
                            $this->viewClothing->ShowError('Se necesita que se agregue una foto para modificar con éxito la categoria.',$auth);
                        }
                    }
                    else{
                        $this->viewClothing->ShowError('Ya se encuentra cargada la categoria, ingrese una diferente.',$auth);
                    }   
                }
                else{
                    $this->viewClothing->ShowError('No se pudo modificar la categoria, verifique tener todos los campos completos.',$auth);
                }
            }
            else{
                $this->viewClothing->ShowError('Ingrese un id válido.',$auth);
            }
        }
        else{
            $this->viewClothing->ShowError('No se puede modificar las categorias por que no se encuentra registrado. Para hacer esta accion REGISTRESE.', $auth);
        }
    }
    public function DeleteCategory($id){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
            if($this->Idparams($id)){
                if($this->CheckCategoryAssignedToAClothing($id)){
                    $Id=intval($id);
                    $this->model->DeleteCategory($Id);
                    $this->viewClothing->ShowSuccess('Se eliminó con éxito el tipo de tela.','Delete category','Categories', $auth);
                }
                else{
                    $this->viewClothing->ShowError('No se puede eliminar dado que existen prendas que son parte de este tipo de tela.',$auth);
                }
            }
            else{
                $this->viewClothing->ShowError('Ingrese un id válido.',$auth);
            }
        }
        else{
            $this->viewClothing->ShowError('No se puede eliminar las telas porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }
    public function Idparams($id){
        $CategoriesId=$this->model->CategoriesId();
        foreach($CategoriesId as $Category){
            if($Category->id_tela==$id){
                return true;
            }
        }
        return false;
    }    
    public function CheckCategoryAssignedToAClothing($id){
        $ClothingIdtela=$this->modelClothing->CategoriesIdTela();
        foreach($ClothingIdtela as $Clothing){
            if($Clothing->id_tela==$id){
                return false;
            }
        }
        return true;
    }
    public function CheckCategories($categoria,$id=NULL){
        if($id!=NULL){
            $Categories=$this->model->getCategoriesOnlyIdAndTipoDeTela();
            foreach($Categories as $category){
                if($category->tipo_de_tela==$categoria && $category->id_tela==$id){
                        return true;
                }
                else if($category->tipo_de_tela==$categoria && $category->id_tela!=$id){
                    return false;
                }
            }
            return true;
        }
        else{
            $Categories=$this->model->getTipoDeTelaCategories();
            foreach($Categories as $category){
                if($category->tipo_de_tela == $categoria){
                    return false;
                }
            }
            return true;
        }
    }
}
?>