<?php
require_once './app/models/CategoriesModel.php';
require_once './app/views/ApiClothingView.php';

class CategoriesApiController{
    private $model;
    private $view;
    private $data;

    public function __construct(){
        $this->model= new CategoriesModel();
        $this->view= new ApiClothingView();
        $this->data= file_get_contents('php://input');
    }

    public function getCategories(){
        $categories= $this->model->getCategoriesAll();
        if($categories){
            $this->view->response($categories, 200);
        }
        else{
            $this->view->response('No existe ninguna categoria', 404);
        }
    }

    public function getCategory($id= null){
        if(isset($id) && $id != null){
            $id_category= $id[':ID'];
            $category= $this->model->getCategoriesOne($id_category);
            if($category){
                $this->view->response($category, 200);
            }
            else{
                $this->view->response('No existe la categoria solicitada', 404);
            }
        }
        else{
            $this->view->reponse('Ingrese una categoria valida', 404);
        }
    }

    public function addCategory(){
        $category= $this->getData();
        if(isset($category->tipo_de_tela)&& isset($category->descripcion) && isset($category->lavado_de_tela)
                && isset($category->temperatura_de_lavado) && isset($category->imagen) && !empty($category->tipo_de_tela) &&
                !empty($category->descripcion) && !empty($category->lavado_de_tela) && !empty($category->temperatura_de_lavado) &&
                !empty($category->imagen) && !is_numeric($category->tipo_de_tela) && !is_numeric($category->descripcion) && 
                !is_numeric($category->lavado_de_tela) && !is_numeric($category->temperatura_de_lavado)){
                    $tela= $category->tipo_de_tela;
                    $descripcion= $category->descripcion;
                    $lavado= $category->lavado_de_tela;
                    $temperatura= $category->temperatura_de_lavado;
                    $imagen= $category->imagen;
                    $this->model-> addCategory($descripcion, $lavado,$temperatura,$tela,$imagen);
                    $this->view->response('Se logro agregar su categoria', 201);
        }
        else{
            $this->view->response('Ingrese correctamente los datos', 404);
        }
    }
    
    public function deleteCategory($id = null){
        if(isset($id) && $id != null){
            $id_category= $id[':ID'];
            $category= $this->model->getCategoriesOne($id_category);
            if($category){
                $this->model->deleteCategory($id_category);
                $this->view->response('Se elimino con exito', 200);
            }
            else{
                $this->view->response('Ingrese una categoria valida', 404);
            }
        }
        else{
            $this->view->response('Ingrese una categoria', 404);
        }
    }

    public function updateCategory($id = null){
        if(isset($id) && $id != null){
            $idcategory= $id[':ID'];
            $oneCategory= $this->model->getCategoriesOne($idcategory);
            if($oneCategory){
                $category= $this->getData();
                if(isset($category->tipo_de_tela)&& isset($category->descripcion) && isset($category->lavado_de_tela)
                && isset($category->temperatura_de_lavado) && isset($category->imagen) && !empty($category->tipo_de_tela) &&
                !empty($category->descripcion) && !empty($category->lavado_de_tela) && !empty($category->temperatura_de_lavado) &&
                !empty($category->imagen) && !is_numeric($category->tipo_de_tela) && !is_numeric($category->descripcion) && 
                !is_numeric($category->lavado_de_tela) && !is_numeric($category->temperatura_de_lavado)){
                    $tela= $category->tipo_de_tela;
                    $descripcion= $category->descripcion;
                    $lavado= $category->lavado_de_tela;
                    $temperatura= $category->temperatura_de_lavado;
                    $imagen= $category->imagen;
                    $this->model->updateCategories($tela, $lavado, $temperatura, $descripcion, $idcategory, $imagen);
                    $this->view->response('Se modifico con exito la categoria', 200);
                }
                else{
                $this->view->response('Verifique que todos los campos esten completos', 404);
                }
            }
            else{
                $this->view->response('No se encontro el elemento seleccionado', 404);
            }
        }    
        else{
            $this->view->response('No se ha especificado la categoria', 404);
        }
    }

    public function getData(){
        return json_decode($this->data);
    }

}