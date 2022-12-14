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
            if($this->Idparams($id)){
                $OneClothes=$this->model->getOneClothes($id);
                $this->view->ShowOneClothes($OneClothes,$auth);
            }
            else{
                $this->view->ShowError('La prenda no existe, por favor busque una que se encuentre en está página.',$auth);
            }
        }
        else{
            $this->view->ShowError('Ingrese un id válido.',$auth); 
        }
    }
    public function Homepage(){
        $auth = $this->Auth->CheckLoggedIn();
        $Categories=$this->modelCategory->getTipoDeTelaAndImagenCategories();
        if($auth){
            $nombre = $_SESSION['User'];
            $this->view->Homepage($auth,$Categories,$nombre);
        }
        else{
            $this->view->Homepage($auth,$Categories);
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
                $this->view->ShowError('No hay prendas disponibles que coincidan con el tipo de tela seleccionado.',$auth);
            }
        }
        else{
            if(isset($_GET['category']) && !empty($_GET['category']) && !is_numeric($_GET['category'])){
                $Clothing= $this->model->getAllByCategory($_GET['category']);
                if(!empty($Clothing)){
                    $this->view->ShowClothesByCategory($Clothing,$auth);
                }
                else{
                    $this->view->ShowError('No hay prendas disponibles que coincidan con el tipo de tela seleccionado.',$auth);
                }
            }
            else{
                $this->view->ShowError('Complete correctamente el campo para ver las prendas pertenecientes a cierto tipo de tela.',$auth);
            }
        }    
    }
    public function DeleteClothing($id){
        $auth = $this->Auth->CheckLoggedIn();
        if($auth){
            if(is_numeric($id) && !empty($id)){
                if($this->Idparams($id)){
                    $this->model->DeleteClothing($id);
                    $this->view->ShowSuccess('Se eliminó esta prenda con éxito.','Delete Clothing','Clothing/GetClothing',$auth);
                }
                else{
                    $this->view->ShowError('La prenda no existe, por favor busque una que se encuentre en está página.',$auth);
                }
            }
            else{
                $this->view->ShowError('Ingrese un id válido.',$auth);
            }
        }
        else{
            $this->view->ShowError('No se puede eliminar prendas porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }
    public function AddClothingForm(){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
            $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
            $this->view->FormAddClothing($categories,$auth);
        }
        else{
            $this->view->ShowError('No se puede agregar prendas porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }  
    }

    public function AddClothing(){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
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
                if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
                    if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                            || $_FILES['imagen']['type'] == "image/png" ) {
                        $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                        $this->model->AddClothing($prenda,$sexo,$color,$talla,$category,$img);
                        $this->view->ShowSuccess('La prenda ha sido agregada con éxito.','Add Clothing','Clothing/GetClothing',$auth);
                    }
                    else{
                        $this->view->ShowError('El formato de la imagen no es válida, ingrese otro diferente.',$auth);
                    }
                }
                else{
                    $this->view->ShowError('Se necesita que se agregue una foto para agregar correctamente la prenda.',$auth);
                }
            }
            else{
                $this->view->ShowError('Complete todos los campos para agregar la prenda.',$auth);            
            }
        }
        else{
            $this->view->ShowError('No se puede agregar prendas porque no se ha iniciado sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }

    private function uploadImage($image){
        $target = './imgs/clothing/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
    public function FormUpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
            if(is_numeric($id)&& !empty($id)){
                if($this->Idparams($id)){
                    $Clothing = $this->model->getOneClothes($id);
                    $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
                    $sexo = $Clothing->sexo;
                    $talla = $Clothing->talla;
                    $color = $Clothing->color;
                    $prenda = $Clothing->prenda;
                    $this->view->ShowFormUpdate($sexo, $talla, $color, $prenda, $id,$categories,$auth);
                }
                else{
                    $this->view->ShowError('La prenda no existe, por favor busque una que se encuentre en está página.',$auth);
                }
            }
            else{
                $this->view->ShowError('Ingrese un id válido.',$auth);
            }
        }
        else{
            $this->view->ShowError('Para modificar datos de las prendas tendrá que iniciar sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
        }
    }
    
    public function UpdateClothing($id){
        $auth=$this->Auth->CheckLoggedIn();
        if($auth){
            if($this->Idparams($id)){
                if(isset($_POST['prenda']) && isset($_POST['sexo']) &&
                isset($_POST['color']) && isset($_POST['talla']) && 
                isset($_POST['category']) && !empty($_POST['prenda']) && 
                !empty($_POST['sexo']) && !empty($_POST['color']) && 
                !empty($_POST['talla']) && !empty($_POST['category']) && 
                !is_numeric($_POST['prenda']) && !is_numeric($_POST['sexo']) && 
                !is_numeric($_POST['color']) && !is_numeric($_POST['talla'])){
                    $prenda = $_POST['prenda'];
                    $color = $_POST['color'];
                    $talla = $_POST['talla'];
                    $sexo = $_POST['sexo'];
                    $Id=intval($id);
                    $category = intval($_POST['category']);
                    if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
                        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
                        || $_FILES['imagen']['type'] == "image/png" ){
                            $img=$this->uploadImage($_FILES['imagen']['tmp_name']);
                            $this->model->UpdateClothes($prenda, $color, $talla, $sexo, $category, $Id,$img);
                            $this->view->ShowSuccess('La prenda se modificó con éxito.', 'Update clothes','Clothing/GetClothing', $auth);
                        }
                        else{
                            $this->view->ShowError('El formato de la imagen no es válido. Ingrese uno diferente.',$auth);
                        }
                    }
                    else{
                        $this->view->ShowError('Se necesita que se agregue una foto para modificar con éxito la prenda.',$auth);             
                    }
                }
                else{
                    $this->view->ShowError('Complete todos los campos para modificar la prenda.',$auth);
                }
            }
            else{
                $this->view->ShowError('Ingrese una id válida.',$auth);
            }
        }
        else{
            $this->view->ShowError('Para modificar datos de las prendas tendrá que iniciar sesión. Si no tiene un usuario, para hacer esta acción tendrá que REGISTRARSE.', $auth);
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
}

?>
