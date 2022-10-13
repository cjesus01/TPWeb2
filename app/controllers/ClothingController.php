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
        if(is_numeric($id) && !empty($id)){
            $OneClothes=$this->model->getOneClothes($id);
            $this->view->ShowOneClothes($OneClothes,$auth);
        }
        else{
            $this->view->ShowError('Ingrese un id válido',$auth);
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
    public function getClothesByCategory(){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_GET['category']) && !empty($_GET['category'])){
            $Category=intval($_GET['category']);
            $Clothing= $this->model->getAllByCategory($Category);
            if(!empty($Clothing)){
                $this->view->ShowClothesByCategory($Clothing,$auth);
            }
            else{
                $this->view->ShowError('No hay prenda que coincida con esa categoria',$auth);
            }     
        }
        else{
            $this->view->ShowError('Ingrese una categoria',$auth);
        }
    }
    public function DeleteClothing($id){
        $auth = $this->Auth->CheckLoggedIn();
        if(is_numeric($id) && !empty($id)){
            $this->model->DeleteClothing($id);
            $this->view->ShowSuccess('Se eliminó con éxito','Delete Clothing',$auth);
        }
        else{
            $this->view->ShowError('Ingrese un id válido',$auth);
        }
    }
    public function AddClothingForm(){
        $auth=$this->Auth->CheckLoggedIn();
        $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
        $this->view->FormAddClothing($categories,$auth);
    }  
    public function AddClothing(){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_GET['prenda']) && isset($_GET['sexo']) &&
           isset($_GET['color']) && isset($_GET['talla']) && 
           isset($_GET['category']) && !empty($_GET['prenda']) && 
           !empty($_GET['sexo']) && !empty($_GET['color']) && 
           !empty($_GET['talla']) && !empty($_GET['category']) && 
           !is_numeric($_GET['prenda']) && !is_numeric($_GET['sexo']) && 
           !is_numeric($_GET['color']) && !is_numeric($_GET['talla'])){
            $prenda=$_GET['prenda'];
            $sexo=$_GET['sexo'];
            $color=$_GET['color'];
            $talla=$_GET['talla'];
            $category=intval($_GET['category']);

            $this->model->AddClothing($prenda,$sexo,$color,$talla,$category);
            $this->view->ShowSuccess('Se agregó con éxito','Add Clothing',$auth);
           }
           else{
            $this->view->ShowError('Complete todo el formulario',$auth);
           }      
    }
    public function FormUpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if(is_numeric($id)&& !empty($id)){
            $Clothing = $this->model->getOneClothes($id);
            $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
            $sexo = $Clothing->sexo;
            $talla = $Clothing->talla;
            $color = $Clothing->color;
            $prenda = $Clothing->prenda;
            $this->view->ShowFormUpdate($sexo, $talla, $color, $prenda, $id,$categories,$auth);
        }else{
            $this->view->ShowError('Ingrese un id válido',$auth);
        }
    }
    public function UpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if(isset($_GET['prenda']) && isset($_GET['sexo']) &&
           isset($_GET['color']) && isset($_GET['talla']) && 
           isset($_GET['category']) && !empty($_GET['prenda']) && 
           !empty($_GET['sexo']) && !empty($_GET['color']) && 
           !empty($_GET['talla']) && !empty($_GET['category']) && 
           !is_numeric($_GET['prenda']) && !is_numeric($_GET['sexo']) && 
           !is_numeric($_GET['color']) && !is_numeric($_GET['talla'])){
            
            $prenda = $_GET['prenda'];
            $color = $_GET['color'];
            $talla = $_GET['talla'];
            $sexo = $_GET['sexo'];
            $Id=intval($id);
            $category = intval($_GET['category']);
           
            $this->model->UpdateClothes($prenda, $color, $talla, $sexo, $category, $Id);
            $this->view->ShowSuccess('Se modificó con exito.', 'Update clothes',$auth);
        }
        else{
            $this->view->ShowError('No se pudo modificar',$auth);
        }
    }
    public function Error($message){
        $auth = $this->Auth->CheckLoggedIn();
        $this->view->ShowError($message,$auth);
    }    

}
