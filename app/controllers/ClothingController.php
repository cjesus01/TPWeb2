<?php
require_once './app/views/ClothingView.php';
require_once './app/models/ClothingModel.php';
require_once './app/models/CategoriesModel.php';

class ClothingController{
    private $model;
    private $view;
    private $modelCategory;
    public function __construct(){
        $this->model = new ClothingModel();
        $this->view = new ClothingView();
        $this->modelCategory= new CategoriesModel();
    }
    public function getClothes(){
        $Clothing = $this->model->getAll();
        $this->view->ShowClothes($Clothing);
    }
    public function getJustOneClothes($id){
        if(is_numeric($id) && !empty($id) && $this->Idparams($id)===true){
            $OneClothes=$this->model->getOneClothes($id);
            $this->view->ShowOneClothes($OneClothes);
        }
        else{
            $this->view->ShowError('Ingrese un id válido');
        }
    }
    public function Homepage(){
        $this->view->Homepage();
    }
    public function getClothesByCategory(){
        if(isset($_GET['category']) && !empty($_GET['category'])){
            $Category =intval($_GET['category']);
            $Clothing= $this->model->getAllByCategory($Category);
            if(!empty($Clothing)){
                $this->view->ShowClothesByCategory($Clothing);
            }
            else{
                $this->view->ShowError('No hay prenda que coincida con esa categoria');
            }
            
        }
        else{
            $this->view->ShowError('Ingrese una categoria');
        }
    }
    public function DeleteClothing($id){
        if(is_numeric($id) && !empty($id) && $this->Idparams($id)===true){
            $this->model->DeleteClothing($id);
            $this->view->ShowSuccess('Se eliminó con éxito','Delete Clothing');
        }
        else{
            $this->view->ShowError('Ingrese un id válido');
        }
    }
    public function AddClothingForm(){
        $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
        $this->view->FormAddClothing($categories);
    }  
    public function AddClothing(){
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
            $this->view->ShowSuccess('Se agregó con éxito','Add Clothing');
           }
           else{
            $this->view->ShowError('Complete todo el formulario');
           }
           
    }
    public function FormUpdateClothing($id){
        if(is_numeric($id)&& !empty($id) && $this->Idparams($id)===true){
            $Clothing = $this->model->getOneClothes($id);
            $categories=$this->modelCategory->getCategoriesOnlyIdAndTipoDeTela();
            $sexo = $Clothing->sexo;
            $talla = $Clothing->talla;
            $color = $Clothing->color;
            $prenda = $Clothing->prenda;
            $this->view->ShowFormUpdate($sexo, $talla, $color, $prenda, $id,$categories);
        }
        else{
            $this->view->ShowError('Ingrese un id válido.');
        }
    }
    public function UpdateClothing($id){
        if(isset($_GET['prenda']) && isset($_GET['sexo']) &&
           isset($_GET['color']) && isset($_GET['talla']) && 
           isset($_GET['category']) && !empty($_GET['prenda']) && 
           !empty($_GET['sexo']) && !empty($_GET['color']) && 
           !empty($_GET['talla']) && !empty($_GET['category']) && 
           !is_numeric($_GET['prenda']) && !is_numeric($_GET['sexo']) && 
           !is_numeric($_GET['color']) && !is_numeric($_GET['talla']) && $this->Idparams($id)===true){
            
            $prenda = $_GET['prenda'];
            $color = $_GET['color'];
            $talla = $_GET['talla'];
            $sexo = $_GET['sexo'];
            $Id=intval($id);
            $category = intval($_GET['category']);
           
            $this->model->UpdateClothes($prenda, $color, $talla, $sexo, $category, $Id);
            $this->view->ShowSuccess('Se modificó con exito.', 'Update clothes');
        }
        else{
            $this->view->ShowError('No se pudo modificar con exito');
        }
    }
    public function Error($message){
        $this->view->ShowError($message);
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

}
