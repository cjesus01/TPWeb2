<?php
    require_once './app/models/UssersModel.php';
    require_once './app/views/UssersView.php';
    require_once './app/helpers/AuthHelper.php';
    class UssersController extends AuthHelper{
        private $model;
        private $view;
        private $Auth;
        public function __construct(){
            $this->model= new UssersModel();
            $this->view= new UssersView();
            $this->Auth= new AuthHelper();
        }
        public function FormLogin(){
            $auth=$this->Auth->CheckLoggedIn();
            $this->view->ShowFormLogin($auth);
        }
        public function LoginIn(){
            $auth=$this->Auth->CheckLoggedIn();
            if(isset($_POST['Nombre']) &&  !empty($_POST['Nombre']) && !is_numeric($_POST['Nombre']) &&
               isset($_POST['Contraseña']) && !empty($_POST['Contraseña'])){
                $nombre=$_POST['Nombre'];
                $contraseña = $_POST['Contraseña'];
                $Usser=$this->model->GetUsser($nombre);
                if($Usser=== false){
                    $this->view->ShowFormLogin($auth,'Usuario incorrecto, intentelo nuevamente.');
                }
                else if(password_verify($contraseña, $Usser->contraseña)){
                    $_SESSION['User'] = $nombre;
                    $auth=$this->Auth->ChecksessionStart();
                    $this->view->Homepage($auth,$nombre);
                }
                else{
                    $this->view->ShowFormLogin($auth,'Contraseña incorrecta, intentelo nuevamente.');
                }
            }
            else{
                $this->view->ShowError('Complete todos los campos.',$auth);
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
        $auth=$this->Auth->CheckLogout();
        $this->view->ShowFormLogin($auth);
    }
}
?>