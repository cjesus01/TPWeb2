<?php
require_once './app/views/CategoriesView.php';
require_once './app/models/CategoriesModel.php';
require_once './helpers/AuthHelper.php';

class CategoriesController extends AuthHelper{
    private $model;
    private $view;
    private $Auth;

    public function __construct(){
        $this->model = new CategoriesModel();
        $this->view = new CategoriesView();
        $this->Auth =new AuthHelper();
    }

    public function getCategories(){
        $Categories = $this->model->getCategoriesAll();
        $Auth=$this->Auth->CheckLoggedIn();
        $this->view->ShowCategories($Categories,$Auth);
    }
    
    public function FormAddCategories(){
        $this->view->ShowFormCategories();
    }
    public function AddCategories(){
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
            $this->view->ShowSuccess('Se agregó con correctamente','Add Categories');
        }
        else{
            $this->view->ShowError('No se pudo agregar la categoria');
        }
    }
    public function FormUpdateCategories($id){
        if(is_numeric($id) && !empty($id)){
            $Id=intval($id);
            $category = $this->model->getCategoriesOne($id);
            $categoria = $category->tipo_de_tela;
            $descripcion = $category->descripcion;
            $lavado = $category->lavado_de_tela;
            $temperatura = $category->temperatura_de_lavado;
            $categorias=$this->model->getCategoriesOnlyTipoDeTela();
            $this->view->ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura,$categorias);
        }
    }
    public function UpdateCategories($id){
        if(isset($_GET['descripcion']) && isset($_GET['lavado']) &&
            isset($_GET['temperatura']) && isset($_GET['categoria']) && 
            !empty($_GET['descripcion']) && !empty($_GET['lavado']) &&
            !empty($_GET['temperatura']) && !empty($_GET['categoria']) && 
            !is_numeric($_GET['descripcion']) && !is_numeric($_GET['lavado']) && 
            !is_numeric($_GET['temperatura']) && !is_numeric($_GET['categoria'])){
                $descripcion = $_GET['descripcion'];
                $lavado = $_GET['lavado'];
                $temperatura = $_GET['temperatura'];
                $categoria = $_GET['categoria'];
                $Id=intval($id);
                
                $this->model->UpdateCategories($categoria, $lavado, $temperatura, $descripcion, $Id);
                $this->view->ShowSuccess('Se pudo modificar con exito', 'Update categories');
        }
        else {
            $this->view->ShowSuccess('No se pudo modificar', 'Update categories');
        }
    }
    public function DeleteCategory($id){
        $Id=intval($id);
        $this->model->DeleteCategory($Id);
        $this->view->ShowSuccess('Se eliminó con éxito.','Delete category');
    }
}
?>