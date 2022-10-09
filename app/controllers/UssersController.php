<?php
    // require_once './models/UssersModel.php';
    require_once './app/views/UssersView.php';
    class UssersController{
        private $model;
        private $view;
        public function __construct(){
            // $this->model= new UssersModel();
            $this->view= new UssersView();
        }
        public function FormGetLogin(){
            $this->view->ShowFormLogin();
        }
        public function LoginIn(){
            //tomar valores y mandar a base de datos y despues mostrar en la vista Getclothes.
        }
        public function FormRegister(){
            $this->view->ShowFormRegister();
        }
    }
?>