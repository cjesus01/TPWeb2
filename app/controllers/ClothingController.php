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
}
