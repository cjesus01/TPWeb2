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
            if(isset($_GET['descripcion']) && isset($_GET['lavado']) &&
            isset($_GET['temperatura']) && isset($_GET['categoria']) && 
            !empty($_GET['descripcion']) && !empty($_GET['lavado']) &&
            !empty($_GET['temperatura']) && !empty($_GET['categoria']) && 
            !is_numeric($_GET['descripcion']) && !is_numeric($_GET['lavado']) && 
            !is_numeric($_GET['temperatura']) && !is_numeric($_GET['categoria'])){
            $descripcion=$_GET['descripcion'];
            $lavado=$_GET['lavado'];
            $temperatura=$_GET['temperatura'];
            $category=$_GET['categoria'];
            $this->model->AddCategorie($descripcion, $lavado,$temperatura,$category);
            $this->viewClothing->ShowSuccess('Se agregó correctamente','Add Categories','Categories/Category', $auth);
        }
        else{
            $auth=$this->Auth->CheckLoggenIn();
            $this->viewClothing->ShowError('No se logró agregar la categoria.', $auth);
        }
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
            $categorias=$this->model->getCategoriesOnlyTipoDeTela();
            $this->view->ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura,$categorias,$auth);
        }
        else{
            $this->viewClothing->ShowError('Ingrese id válido.',$auth);
        }
    }
    public function UpdateCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(isset($_GET['descripcion']) && isset($_GET['lavado']) &&
            isset($_GET['temperatura']) && isset($_GET['categoria']) && 
            !empty($_GET['descripcion']) && !empty($_GET['lavado']) &&
            !empty($_GET['temperatura']) && !empty($_GET['categoria']) && 
            !is_numeric($_GET['descripcion']) && !is_numeric($_GET['lavado']) && 
            !is_numeric($_GET['temperatura']) && !is_numeric($_GET['categoria']) && $this->Idparams($id)){
                $descripcion = $_GET['descripcion'];
                $lavado = $_GET['lavado'];
                $temperatura = $_GET['temperatura'];
                $categoria = $_GET['categoria'];
                $Id=intval($id);
                
                $this->model->UpdateCategories($categoria, $lavado, $temperatura, $descripcion, $Id);
                $this->viewClothing->ShowSuccess('Se modificó con éxito.', 'Update categories','Categories/Category', $auth);
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
}
?>