<?php
require_once './app/models/CategoriesModel.php';
require_once './api/ApiClothingView.php';

class CategoriesApiController{
    private $model;
    private $modelClothing;
    private $view;
    private $data;

    public function __construct(){
        $this->model= new CategoriesModel();
        $this->modelClothing= new ClothingModel();
        $this->view= new ApiClothingView();
        $this->data= file_get_contents('php://input');
    }


    public function addCategory(){
        $category= $this->getData();
        if(isset($category->tipo_de_tela) && !empty($category->tipo_de_tela) && !is_numeric($category->tipo_de_tela) && !is_null($category->tipo_de_tela)){
            if($this->checkExistingCategories($category->tipo_de_tela)){
                if(isset($category->descripcion) && isset($category->lavado_de_tela)&& 
                   isset($category->temperatura_de_lavado) && isset($category->imagen) &&
                    !empty($category->descripcion) && !empty($category->lavado_de_tela) && 
                    !empty($category->temperatura_de_lavado) &&!empty($category->imagen) && 
                    !is_numeric($category->descripcion) && !is_numeric($category->lavado_de_tela) && 
                    !is_numeric($category->temperatura_de_lavado)){
                        $tela= $category->tipo_de_tela;
                        $descripcion= $category->descripcion;
                        $lavado= $category->lavado_de_tela;
                        $temperatura= $category->temperatura_de_lavado;
                        $imagen= $category->imagen;
                        $this->model-> addCategory($descripcion, $lavado,$temperatura,$tela,$imagen);
                        $this->view->response('Se logro agregar su categoria', 201);
                }
                else{
                    $this->view->response('Ingrese correctamente los datos', 400);
                }
            }
            else{
                $this->view->response('No puede agregarse ya que esta categoria ya existe.', 400);
            }
        }
        else{
            $this->view->response('Ingrese el tipo de tela para poder agregar.', 400);
        }    
    }
    
    public function deleteCategory($id = null){
        if(isset($id) && $id != null){
            $id_category= $id[':ID'];
            $category= $this->model->getCategoriesOne($id_category);
            if($category){
                if($this->checkCategoryAssignedToAClothing($category->id_tela)){
                    $this->model->deleteCategory($id_category);
                    $this->view->response('Se eliminó con éxito.', 200);
                }
                else{
                    $this->view->response('No se puede eliminar la categoria ya que existen prendas asignadas a esta.', 400);
                }
            }
            else{
                $this->view->response('Ingrese una categoria válida.', 400);
            }
        }
        else{
            $this->view->response('Ingrese una categoria.', 404);
        }
    }

    public function updateCategory($id = null){
        if(isset($id) && $id != null){
            $idcategory= $id[':ID'];
            $oneCategory= $this->model->getCategoriesOne($idcategory);
            if($oneCategory){
                $category= $this->getData();
                if(isset($category->id_tela) && !empty($category->id_tela) && !is_null($category->id_tela)){
                    if($this->checkCategories($category->id_tela,$idcategory)){
                        if($this->checkIfCategoryRepeats($category->tipo_de_tela,$idcategory)){
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
                                $this->view->response('Verifique que todos los campos esten completos', 400);
                            }
                        }
                        else{
                            $this->view->response('No puede modificarse ya que esta categoria ya existe.', 400);
                        }    
                    }
                    else{
                        $this->view->response('No puede modificarse ya que esta categoria esta asignada a una prenda.', 400);
                    }
                }
                else{
                    $this->view->response('Verifique que todos los campos esten completos', 400);
                }
            } 
            else{
                $this->view->response('No se encontro el elemento seleccionado', 404);
            }            
        }    
        else{
            $this->view->response('No se ha especificado la categoria', 400);
        }
    }

    public function getData(){
        return json_decode($this->data);
    }
    public function checkCategoryAssignedToAClothing($id){
        $ClothingIdtela=$this->modelClothing->CategoriesIdTela();
        foreach($ClothingIdtela as $Clothing){
            if($Clothing->id_tela==$id){
                return false;
            }
        }
        return true;
    }
    public function checkCategories($id_tela,$idParams){
        if($id_tela == $idParams){
            return true;
        }
        else{
            return false;
        }
    }
    public function checkIfCategoryRepeats($categoria,$id){
        $categories=$this->model->getCategoriesOnlyIdAndTipoDeTela();
        foreach($categories as $category){
            if($category->tipo_de_tela==$categoria && $category->id_tela==$id){
                return true;
            }
            else if($category->tipo_de_tela==$categoria && $category->id_tela!=$id){
                return false;
            }
            else if($category->tipo_de_tela!=$categoria && $category->id_tela==$id){
                return $this->checkExistingCategories($categoria);
            }
        }
    }

    public function checkExistingCategories($categoria){
        $Categories=$this->model->getTipoDeTelaCategories();
        foreach($Categories as $category){
            if($category->tipo_de_tela == $categoria){
                return false;
            }
        }
        return true;
    }      
}
