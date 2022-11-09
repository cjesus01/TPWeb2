<?php 
    require_once 'app/models/ClothingModel.php';
    require_once 'app/models/CategoriesModel.php';
    require_once './api/ApiClothingView.php';

    class ApiClothingController {

        private $model;
        private $modelCategory;
        private $view;
        private $data;

        public function __construct(){
            $this->model = new ClothingModel();
            $this->modelCategory= new CategoriesModel();
            $this->view = new ApiClothingView();
            $this->data = file_get_contents("php://input"); 
        }

        public function getClothing(){
            $clothing = $this->model->getAllClothing();
            $this->view->response($clothing, 200);
        }
        public function getClothes($params= []){
            $id=$params[':ID'];
            $clothes=$this->model->getClothing($id);
            if($clothes){
                $this->view->response($clothes, 200);
            }
            else{
                $this->view->response("El número ingresado no existe",400);
            }
        }
        public function addClothing(){
            $clothes=$this->getData();
            if(isset($clothes->id_tela) && !empty($clothes->id_tela) && 
            is_numeric($clothes->id_tela) && $this->existingCategory($clothes->id_tela)){
                if(isset($clothes->prenda) && isset($clothes->sexo) &&
                isset($clothes->color) && isset($clothes->talla) && 
                !empty($clothes->prenda) && !empty($clothes->sexo) &&
                !empty($clothes->color) && !empty($clothes->talla) && 
                !is_numeric($clothes->prenda) && !is_numeric($clothes->sexo) && 
                !is_numeric($clothes->color) && !is_numeric($clothes->talla) && 
                isset($clothes->imagen_prenda) && !empty($clothes->imagen_prenda)){
                    $prenda=$clothes->prenda;
                    $sexo=$clothes->sexo;
                    $color=$clothes->color;
                    $talla=$clothes->talla;
                    $category=$clothes->id_tela;
                    $imagen=$clothes->imagen_prenda;
                    $this->model->AddClothing($prenda,$sexo,$color,$talla,$category,$imagen);
                    $this->view->response("Se ingresó con éxito la nueva prenda", 201);
                }
                else{
                    $this->view->response("Complete los datos", 400);
                }
            }
            else{
                $this->view->response('Ingrese una categoria válida.', 400);
            }
        }
        public function deleteClothing($id= null){ //PREGUNTAR JUEVES//
            if(isset($id) && $id != null){
                $id_borrar= $id[':ID'];
                $clothes= $this->model->getClothing($id_borrar);
                if($clothes){
                    $this->model->deleteClothing($id_borrar);
                    $this->view->response('Eliminado con exito', 200);
                }
                else{
                    $this->view->response('No existe la prenda que desea eliminar, intente nuevamente', 404);
                }
            }
            else{
                $this->view->response('Ingrese un numero correspondiente a una prenda', 404);
            }
        }
        public function updateClothing($id= null){
            if(isset($id) && $id != null){
                $id_update= intval($id[':ID']);
                $clothing= $this->model->getClothing($id_update);
                if($clothing){
                    $clothes = $this->getData();
                    if(isset($clothes->id_tela) && !empty($clothes->id_tela) && is_numeric($clothes->id_tela) && $this->existingCategory($clothes->id_tela)){
                        if(isset($clothes->prenda) && isset($clothes->sexo) && 
                        isset($clothes->color) && isset($clothes->talla) && 
                        !empty($clothes->prenda) && !empty($clothes->sexo) && 
                        !empty($clothes->color) && !empty($clothes->talla) && 
                        !is_numeric($clothes->prenda) && !is_numeric($clothes->sexo) && 
                        !is_numeric($clothes->color) && !is_numeric($clothes->talla) && 
                        isset($clothes->imagen_prenda) && !empty($clothes->imagen_prenda)){
                            $prenda= $clothes->prenda;
                            $color= $clothes->color;
                            $talla= $clothes->talla;
                            $sexo= $clothes->sexo;
                            $category= $clothes->id_tela;
                            $img= $clothes->imagen_prenda;
                            $this->model->updateClothes($prenda, $color, $talla, $sexo, $category, $id_update,$img);
                            $this->view->response('Se modificó con éxito los datos', 200);
                        }
                        else{
                            $this->view->response('Ingrese correctamente los datos', 400);
                        }
                    }
                    else{
                        $this->view->response('Ingrese una categoria válida.', 400);
                    }
                }
                else{
                    $this->view->response('No se encontro el elemento solicitado', 404);
                }
            }
            else{
                $this->view->response('No se ha especificado una prenda', 404);
            }
        }
        public function getData(){
            return json_decode($this->data);
        }
        public function existingCategory($idCategory){
            $category=$this->modelCategory->getCategoriesOne($idCategory);
            if($category){
                return true;
            }
            else{
                return false;
            }
        }
    }