<?php
require_once './app/views/ClothingView.php';
require_once './app/models/ClothingModel.php';
require_once './app/models/CategoriesModel.php';
require_once './app/helpers/AuthHelper.php';

class ClothingController extends AuthHelper{
    private $model;
    private $view;
    private $modelCategory;
    private $Auth;

    public function __construct(){
        $this->model = new ClothingModel();
        $this->view = new ClothingView();
        $this->modelCategory= new CategoriesModel();
        $this->Auth = new AuthHelper();
    }
    public function getClothes(){
        $Clothing = $this->model->getAll();
        $auth = $this->Auth->CheckLoggedIn();
        $this->view->ShowClothes($Clothing, $auth);
    }
    public function getJustOneClothes($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(is_numeric($id) && !empty($id) && $this->Idparams($id)){
            $OneClothes=$this->model->getOneClothes($id);
            $this->view->ShowOneClothes($OneClothes,$auth);
        }
        else{
            $this->view->ShowError('Ingrese un id válido.',$auth);
        }
    }
    public function Homepage(){
        $auth = $this->Auth->CheckLoggedIn();
        if($auth===true){
            $nombre = $_SESSION['User'];
            $this->view->Homepage($auth, $nombre);
        }
        else{
            $this->view->Homepage($auth);
        }
    }
    public function getClothesByCategory($Category=NULL){
        $auth=$this->Auth->CheckLoggedIn();
        if($Category!=NULL){
            $Clothing= $this->model->getAllByCategory($Category);
            if(!empty($Clothing)){
                $this->view->ShowClothesByCategory($Clothing,$auth);
            }
            else{
                $this->view->ShowError('No hay prenda que coincida con esa categoria.',$auth);
            } 
        }
        else{
            if(isset($_GET['category']) && !empty($_GET['category'])){
                $Category=intval($_GET['category']);
                $Clothing= $this->model->getAllByCategory($Category);
                if(!empty($Clothing)){
                    $this->view->ShowClothesByCategory($Clothing,$auth);
                }
                else{
                    $this->view->ShowError('No hay prenda que coincida con esa categoria.',$auth);
                }     
            }
            else{
                $this->view->ShowError('Ingrese una categoria.',$auth);
            }
        }
    }
    public function DeleteClothing($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(is_numeric($id) && !empty($id) && $this->Idparams($id)){
            $this->model->DeleteClothing($id);
            $this->view->ShowSuccess('Se eliminó con éxito.','Delete Clothing','Clothing/GetClothing',$auth);
        }
        else{
            $this->view->ShowError('Ingrese un id válido.',$auth);
        }
    }
    public function AddClothingForm(){
        $auth=$this->Auth->CheckLoggedIn();
        $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
        $this->view->FormAddClothing($categories,$auth);
    }  
    public function AddClothing(){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_POST['prenda']) && isset($_POST['sexo']) &&
           isset($_POST['color']) && isset($_POST['talla']) && 
           isset($_POST['category']) && !empty($_POST['prenda']) && 
           !empty($_POST['sexo']) && !empty($_POST['color']) && 
           !empty($_POST['talla']) && !empty($_POST['category']) && 
           !is_numeric($_POST['prenda']) && !is_numeric($_POST['sexo']) && 
           !is_numeric($_POST['color']) && !is_numeric($_POST['talla'])){
            $prenda=$_POST['prenda'];
            $sexo=$_POST['sexo'];
            $color=$_POST['color'];
            $talla=$_POST['talla'];
            $category=intval($_POST['category']);
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                    || $_FILES['imagen']['type'] == "image/png" ) {
                $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                $this->model->AddClothing($prenda,$sexo,$color,$talla,$category,$img);
                $this->view->ShowSuccess('Se agregó con éxito.','Add Clothing','Clothing/GetClothing',$auth);
            }
            else{
                $this->model->AddClothing($prenda,$sexo,$color,$talla,$category);
                $this->view->ShowSuccess('Se agregó con éxito.','Add Clothing','Clothing/GetClothing',$auth);
            }
        }
        else{
            $this->view->ShowError('Complete todo el formulario.',$auth);
       }      
    }
    private function uploadImage($image){
        $target = './imgs/clothing/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    public function FormUpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if(is_numeric($id)&& !empty($id) && $this->Idparams($id)){
            $Clothing = $this->model->getOneClothes($id);
            $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
            $sexo = $Clothing->sexo;
            $talla = $Clothing->talla;
            $color = $Clothing->color;
            $prenda = $Clothing->prenda;
            $this->view->ShowFormUpdate($sexo, $talla, $color, $prenda, $id,$categories,$auth);
        }
        else{
            $this->view->ShowError('Ingrese un id válido.',$auth);
        }
    }
    public function UpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_POST['prenda']) && isset($_POST['sexo']) &&
           isset($_POST['color']) && isset($_POST['talla']) && 
           isset($_POST['category']) && !empty($_POST['prenda']) && 
           !empty($_POST['sexo']) && !empty($_POST['color']) && 
           !empty($_POST['talla']) && !empty($_POST['category']) && 
           !is_numeric($_POST['prenda']) && !is_numeric($_POST['sexo']) && 
           !is_numeric($_POST['color']) && !is_numeric($_POST['talla']) && $this->Idparams($id)){
                $prenda = $_POST['prenda'];
                $color = $_POST['color'];
                $talla = $_POST['talla'];
                $sexo = $_POST['sexo'];
                $Id=intval($id);
                $category = intval($_POST['category']);
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                || $_FILES['imagen']['type'] == "image/png" ) {
                        $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                         $this->model->UpdateClothes($prenda, $color, $talla, $sexo, $category, $Id,$img);
                         $this->view->ShowSuccess('Se modificó con exito.', 'Update clothes','Clothing/GetClothing', $auth);
                }
                else{
                    $this->model->UpdateClothes($prenda, $color, $talla, $sexo, $category, $Id);
                    $this->view->ShowSuccess('Se modificó con exito.', 'Update clothes','Clothing/GetClothing', $auth);
                }
            }
            else{
            $this->view->ShowError('No se logró modificar.',$auth);
        }
    }
    public function Idparams($id){
        $Clothing=$this->model->ClothingId();
        foreach($Clothing as $Clothes){
            if($Clothes->id==$id){
                return true;
            }
        }
        return false;
    }
    public function Error($message){
        $auth = $this->Auth->CheckLoggedIn();
        $this->view->ShowError($message,$auth);
    }
    /*public function BringCategories($id){
        $auth = $this->Auth->CheckLoggedIn();
        $Id=intval($id);
        $id_tela = $this->model->BringGarment($Id);  
        $this->view->ShowClothesByCategory($auth, $id_tela);    
    }*/    
}
