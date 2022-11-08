<?php 
    require_once 'app/model/ClothingModel.php';
    require_once './app/view/ApiClothingView.php';

    class ApiClothingController {

        private $model;
        private $view;
        private $data;

        public function __construct(){
            $this->model = new ClothingModel();
            $this->view = new ApiClothingView();
            $this->data = file_get_contents("php://input"); 
        }

        public function getClothing(){
            $clothing = $this->model->getAllClothing();
            $this->view->response($clothing, 200);
        }
        public function getClothes($params){
            $id=$params[':ID'];
            $clothes=$this->model->getClothes($id);
            if($clothes){
                $this->view->response($clothes, 200);
            }
            else{
                $this->view->response("El número ingresado no existe",400);
            }
        }
        public function addClothing(){
            $clothes=$this->getData();
            var_dump($clothes);
            if(isset($clothes->prenda) && isset($clothes->sexo) &&
            isset($clothes->color) && isset($clothes->talla) && 
            isset($clothes->id_tela) && !empty($clothes->prenda) && 
            !empty($clothes->sexo) && !empty($clothes->color) && 
            !empty($clothes->talla) && !empty($clothes->id_tela) && 
            !is_numeric($clothes->prenda) && !is_numeric($clothes->sexo) && 
            !is_numeric($clothes->color) && !is_numeric($clothes->talla) && 
            isset($clothes->imagen) && !empty($clothes->imagen)){
                $prenda=$clothes->prenda;
                $sexo=$clothes->sexo;
                $color=$clothes->color;
                $talla=$clothes->talla;
                $category=$clothes->id_tela;
                $imagen=$clothes->imagen;
                $this->model->insertClothes($prenda,$sexo,$color,$talla,$category,$imagen);
                $this->view->response("Se ingresó con éxito la nueva prenda", 201);
            }
            else{
                $this->view->response("Complete los datos", 400);
            }
        }
        public function getData(){
            return json_decode($this->data);
        }
    }