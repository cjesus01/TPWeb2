<?php
require_once './app/views/ClothingView.php';
require_once './app/models/ClothingModel.php';

class ClothingController{
    private $model;
    private $view;
    public function __construct(){
        $this->model = new ClothingModel();
        $this->view = new ClothingView();
    }
    public function getClothes(){
        $Clothing = $this->model->getAll();
        $this->view->ShowClothes($Clothing);
    }
    public function getJustOneClothes($id){
        if(is_numeric($id) && !empty($id)){
            $OneClothes=$this->model->getOneClothes($id);
            $this->view->ShowOneClothes($OneClothes);
        }
        else{
            ShowError('Ingrese un id válido');
        }
    }
    public function Homepage(){
        $this->view->Homepage();
    }    
}
