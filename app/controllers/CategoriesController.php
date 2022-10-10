<?php
require_once './app/views/CategoriesView.php';
require_once './app/models/CategoriesModel.php';

class CategoriesController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CategoriesModel();
        $this->view = new CategoriesView();
    }

    public function getCategories(){
        $Categories = $this->model->getCategoriesAll();
        $this->view->ShowCategories($Categories);
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
            $categories = $this->model->getCategoriesOne($id);
            $categoria = $categories->tipo_de_tela;
            $descripcion = $categories->descripcion;
            $lavado = $categories->lavado_de_tela;
            $temperatura = $categories->temperatura_de_lavado;

            $this->view->ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura);
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
}
?>