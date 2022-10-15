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
        $this->view->ShowFormCategories($auth);
    }
    public function AddCategories(){
        $auth=$this->Auth->CheckLoggedIn();
            if(isset($_POST['descripcion']) && isset($_POST['lavado']) &&
            isset($_POST['temperatura']) && isset($_POST['categoria']) && 
            !empty($_POST['descripcion']) && !empty($_POST['lavado']) &&
            !empty($_POST['temperatura']) && !empty($_POST['categoria']) && 
            !is_numeric($_POST['descripcion']) && !is_numeric($_POST['lavado']) && 
            !is_numeric($_POST['temperatura']) && !is_numeric($_POST['categoria']) && $this->CheckCategories($_POST['categoria'])){
                $descripcion=$_POST['descripcion'];
                $lavado=$_POST['lavado'];
                $temperatura=$_POST['temperatura'];
                $category=$_POST['categoria'];
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                    || $_FILES['imagen']['type'] == "image/png" ) {
                    $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                    $this->model->AddCategory($descripcion, $lavado,$temperatura,$category,$img);
                    $this->viewClothing->ShowSuccess('Se agregó correctamente','Add Categories','Categories/Category', $auth);
                }
                else{
                    $this->model->AddCategory($descripcion, $lavado,$temperatura,$category);
                    $this->viewClothing->ShowSuccess('Se agregó correctamente','Add Categories','Categories/Category', $auth);
                }
            }
        else{
            $this->viewClothing->ShowError('No se logró agregar la categoria.', $auth);
        }
    }
    private function uploadImage($image){
        $target = './imgs/categories/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
    public function FormUpdateCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(is_numeric($id) && !empty($id) && $this->Idparams($id)){
            $Id=intval($id);
            $category = $this->model->getCategoriesOne($id);
            $categoria = $category->tipo_de_tela;
            $descripcion = $category->descripcion;
            $lavado = $category->lavado_de_tela;
            $temperatura = $category->temperatura_de_lavado;
            $this->view->ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura,$auth);
        }
        else{
            $this->viewClothing->ShowError('Ingrese id válido.',$auth);
        }
    }
    public function UpdateCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(isset($_POST['descripcion']) && isset($_POST['lavado']) &&
            isset($_POST['temperatura']) && isset($_POST['categoria']) && 
            !empty($_POST['descripcion']) && !empty($_POST['lavado']) &&
            !empty($_POST['temperatura']) && !empty($_POST['categoria']) && 
            !is_numeric($_POST['descripcion']) && !is_numeric($_POST['lavado']) && 
            !is_numeric($_POST['temperatura']) && !is_numeric($_POST['categoria']) &&
            $this->Idparams($id) && $this->CheckCategories($_POST['categoria'],$id)){
                $descripcion = $_POST['descripcion'];
                $lavado = $_POST['lavado'];
                $temperatura = $_POST['temperatura'];
                $categoria = $_POST['categoria'];
                $Id=intval($id);
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                    || $_FILES['imagen']['type'] == "image/png" ) {
                    $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                    $this->model->UpdateCategories($categoria, $lavado, $temperatura, $descripcion, $Id,$img);
                    $this->viewClothing->ShowSuccess('Se modificó con éxito.', 'Update categories','Categories/Category', $auth);
                }
                else{
                    $this->model->UpdateCategories($categoria, $lavado, $temperatura, $descripcion, $Id);
                    $this->viewClothing->ShowSuccess('Se modificó con éxito.', 'Update categories','Categories/Category', $auth);
                }
        }
        else {
        $this->viewClothing->ShowError('No se logró modificar.', 'Update categories', $auth);
        }
    }
    public function DeleteCategory($id){
        $auth=$this->Auth->CheckLoggedIn();
        if($this->Idparams($id) && $this->CheckCategoryAssignedToAClothing($id)){
            $Id=intval($id);
            $this->model->DeleteCategory($Id);
            $this->viewClothing->ShowSuccess('Se eliminó con éxito.','Delete category','Categories/Category', $auth);
        }
        else{
            $this->viewClothing->ShowError('No se puede eliminar dado que existen prendas que forman parte de esta categoria.',$auth);
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