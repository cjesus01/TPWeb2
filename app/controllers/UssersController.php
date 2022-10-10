<?php
    require_once './app/models/UssersModel.php';
    require_once './app/views/UssersView.php';
    class UssersController{
        private $model;
        private $view;
        public function __construct(){
            $this->model= new UssersModel();
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
        public function AddUsser(){
            if(isset($_POST['nombre']) && !empty($_POST['nombre']) && !is_numeric($_POST['nombre'])
            && isset($_POST['mail']) && !empty($_POST['mail']) && !is_numeric($_POST['mail'])
            && isset($_POST['contraseña']) && !empty($_POST['contraseña']) && !is_numeric($_POST['contraseña'])){
            $nombre=$_POST['nombre'];
            $Mail=$_POST['mail'];
            $contraseña = $_POST['contraseña'];
            $this->model->AddUsser($nombre, $Mail, $contraseña);
            $this->view->ShowSuccess('Se ha registrado con exito', 'add usser');
        }
        else{
            $this->view->ShowError('No se pudo registrar intentelo nuevamente');
        }
    }
}
?>