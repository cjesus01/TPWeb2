<?php
    require_once './app/models/UssersModel.php';
    require_once './app/views/UssersView.php';
    require_once './app/helpers/AuthHelper.php';
    require_once './app/views/ClothingView.php';
    require_once './app/models/CategoriesModel.php';
    class UssersController extends AuthHelper{
        private $model;
        private $modelCategory;
        private $view;
        private $viewClothing;
        private $Auth;
        public function __construct(){
            $this->model= new UssersModel();
            $this->view= new UssersView();
            $this->viewClothing=new ClothingVIew();
            $this->modelCategory=new CategoriesModel();
            $this->Auth= new AuthHelper();
        }
        public function FormLogin(){
            $auth=$this->Auth->CheckLoggedIn();
            if($auth){
                $this->viewClothing->ShowError('Ya se encuentra registrado.', $auth);
            }
            else{
                $this->view->ShowFormLogin($auth);
            }
        }
        public function LoginIn(){
            $auth=$this->Auth->CheckLoggedIn();
            if($auth){
                $this->viewClothing->ShowError('Ya se encuentra registrado.', $auth);
            }
            else{
                if(isset($_POST['Nombre']) &&  !empty($_POST['Nombre']) && !is_numeric($_POST['Nombre']) &&
                   isset($_POST['Contraseña']) && !empty($_POST['Contraseña'])){
                    $nombre=$_POST['Nombre'];
                    $contraseña = $_POST['Contraseña'];
                    $Usser=$this->model->GetUsser($nombre);
                    if($Usser===false){
                        $this->view->ShowFormLogin($auth,'Usuario incorrecto, intentelo nuevamente.');
                    }
                    else if(password_verify($contraseña, $Usser->contraseña)){
                        $_SESSION['User'] = $nombre;
                        $auth=$this->Auth->ChecksessionStart();
                        $Categories=$this->modelCategory->getTipoDeTelaAndImagenCategories();
                        $this->viewClothing->Homepage($auth,$Categories,$nombre);
                    }
                    else{
                        $this->view->ShowFormLogin($auth,'Contraseña incorrecta, intentelo nuevamente.');
                    }
                }
                else{
                    $this->viewClothing->ShowError('Complete todos los campos para ingresar.',$auth);
                } 
            }
        }
        
        public function FormRegister(){
            $auth=$this->Auth->CheckLoggedIn();
            if($auth){
                $this->viewClothing->ShowError('Ya se encuentra registrado.', $auth);
            }
            else{
                $this->view->ShowFormRegister($auth);
            }
        }

    public function AddUsser(){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && !is_numeric($_POST['nombre'])
        && isset($_POST['mail']) && !empty($_POST['mail']) && !is_numeric($_POST['mail'])
        && isset($_POST['contraseña']) && !empty($_POST['contraseña'])){
            if($this->CheckNameUsser($_POST['nombre'])){
                if($this->CheckMail($_POST['mail'])){
                    $nombre=$_POST['nombre'];
                    $Mail=$_POST['mail'];
                    $contraseña = $_POST['contraseña'];
                    $hash=password_hash($contraseña,PASSWORD_DEFAULT);
                    $this->model->AddUsser($nombre, $Mail, $hash, $auth);
                    $this->viewClothing->ShowSuccess('Usted se ha registrado con éxito.', 'add usser','Login', $auth);
                }
               else{
                $this->viewClothing->ShowError('Ya existe un usuario con ese mail, escoja otro mail para el usuario.', $auth);
               } 
            }
            else{
                $this->viewClothing->ShowError('Ya existe un usuario con ese nombre, escoja otro nombre de usuario.', $auth);
            }
        }
        else{
            $this->viewClothing->ShowError('Complete todos los campos para poder registrarse.', $auth);
        }
    }

    public function Logout(){
        $auth=$this->Auth->CheckLogout();
        $this->view->ShowFormLogin($auth);
    }
    public function CheckNameUsser($NameUsser){
        $Ussers=$this->model->getNamessers();
        foreach($Ussers as $Usser){
            if($Usser->nombre==$NameUsser){
                return false;
            }
        }
        return true;
    }
    public function CheckMail($Mail){
        $Ussers=$this->model->getMailUssers();
        foreach($Ussers as $Usser){
            if($Usser->Mail==$Mail){
                return false;
            }
        }
        return true;
    }
    }

?>