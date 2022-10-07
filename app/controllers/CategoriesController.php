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
}
?>