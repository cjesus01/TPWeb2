<?php
    require_once './app/models/UssersModel.php';
    require_once './app/views/UssersView.php';
    require_once './helpers/AuthHelper.php';
    class UssersController extends AuthHelper{
        private $model;
        private $view;
        public function __construct(){
            $this->model= new UssersModel();
            $this->view= new UssersView();
            $this->Auth= new AuthHelper();
        }
        public function FormLogin(){
            $this->view->ShowFormLogin();
        }
        public function LoginIn(){
            if(isset($_POST['Nombre']) &&  !empty($_POST['Nombre']) && !is_numeric($_POST['Nombre']) &&
               isset($_POST['Contraseña']) && !empty($_POST['Contraseña'])){
                $nombre=$_POST['Nombre'];
                $contraseña = $_POST['Contraseña'];
                $Usser=$this->model->GetUsser($nombre);
                if($Usser=== false){
                    $this->view->ShowFormLogin('Usuario incorrecto, intentelo nuevamente.');
                }
                else if(password_verify($contraseña, $Usser->contraseña)){
                    session_start();
                    $_SESSION['User'] = $nombre;
                    $this->view->Homepage($nombre);
                }
                else{
                    $this->view->ShowFormLogin('Contraseña incorrecta, intentelo nuevamente.');
                }
            }
            else{
                $this->view->ShowError('Complete todos los campos.');
            }
        }
        
        public function FormRegister(){
            $this->view->ShowFormRegister();
        }
        public function AddUsser(){
            if(isset($_POST['nombre']) && !empty($_POST['nombre']) && !is_numeric($_POST['nombre'])
            && isset($_POST['mail']) && !empty($_POST['mail']) && !is_numeric($_POST['mail'])
            && isset($_POST['contraseña']) && !empty($_POST['contraseña'])){
            $nombre=$_POST['nombre'];
            $Mail=$_POST['mail'];
            $contraseña = $_POST['contraseña'];
            $hash=password_hash($contraseña,PASSWORD_DEFAULT);
            $this->model->AddUsser($nombre, $Mail, $hash);
            $this->view->ShowSuccess('Se ha registrado con exito', 'add usser');
        }
        else{
            $this->view->ShowError('No se pudo registrar intentelo nuevamente');
        }
    }

    public function Logout(){
        $this->Auth->CheckLogout();
        $this->view->ShowFormLogin();
    }
}
?>