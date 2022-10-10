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
        public function FormLogin(){
            $this->view->ShowFormLogin();
        }
        public function LoginIn(){
            if(isset($_POST['Nombre']) &&  !empty($_POST['Nombre']) && !is_numeric($_POST['Nombre']) &&
                isset($_POST['Contraseña']) && !empty($_POST['Contraseña']) && !is_numeric($_POST['Contraseña'])){
                $nombre=$_POST['Nombre'];
                $contraseña = $_POST['Contraseña'];
                $Ussers=$this->model->GetUssers();
                $contador=1;
                foreach($Ussers as $usser){
                    if(($nombre == $usser->nombre || $nombre == $usser->Mail) && $contraseña == $usser->contraseña){
                        $contador++;
                        $this->view->Homepage();
                    }
                }
                if($contador==1){
                    $this->view->ShowError('No se pudo ingresar, intentelo nuevamente. gkso');
                }
            }
            else{
                $this->view->ShowError('No se pudo ingresar, intentelo nuevamente.');
            }
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