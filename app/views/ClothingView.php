<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class ClothingView {
    private $smarty;

    public function __construct(){
         $this->smarty= new Smarty();
         $this->smarty->assign('BASE_URL', BASE_URL);
    } 
    public function ShowClothes($Clothing, $auth){
        $this->smarty->assign('Title','Clothing');
        $this->smarty->assign('clothing', $Clothing);
        $this->smarty->assign('auth', $auth);
        $this->smarty->display('./templates/clothing.tpl');
    }
    public function ShowOneClothes($OneClothes,$auth){
        $this->smarty->assign('Title','One Clothes');
        $this->smarty->assign('OneClothes', $OneClothes);
        $this->smarty->assign('auth', $auth);
        $this->smarty->display('./templates/oneclothes.tpl');
    } 
    public function ShowError($message,$auth){
        $this->smarty->assign('Title','Error');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('auth', $auth);
        $this->smarty->display('./templates/error.tpl');
    }
    public function Homepage($auth, $nombre=NULL){
        $this->smarty->assign('Title','Homepage');
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->assign('auth', $auth);
        $this->smarty->display('./templates/homepage.tpl');
    }
    public function ShowClothesByCategory($Clothing,$auth){
        $this->smarty->assign('Clothing', $Clothing);
        $this->smarty->assign('Title','Clothing');
        $this->smarty->assign('auth',$auth);
        $this->smarty->display('./templates/clothingbycategory.tpl');
    }
    public function FormAddClothing($categories,$auth){
        $this->smarty->assign('categories',$categories);
        $this->smarty->assign('Title','Add Clothing');
        $this->smarty->assign('auth',$auth);
        $this->smarty->display('./templates/addformclothing.tpl');
    }
    public function ShowSuccess($message,$title,$button,$auth){
        $this->smarty->assign('Title',$title);
        $this->smarty->assign('message', $message);
        $this->smarty->assign('auth', $auth);
        $this->smarty->assign('return', $button);
        $this->smarty->display('./templates/showsuccess.tpl');
    }
    public function ShowFormUpdate($sexo, $talla, $color, $prenda, $id,$categories,$auth){
        $this->smarty->assign('Title', 'form update');
        $this->smarty->assign('sexo', $sexo);
        $this->smarty->assign('auth',$auth);
        $this->smarty->assign('talla', $talla);
        $this->smarty->assign('color', $color);
        $this->smarty->assign('prenda', $prenda);
        $this->smarty->assign('categories',$categories);
        $this->smarty->assign('id', $id);
        $this->smarty->display('./templates/updateformclothing.tpl');
    }
}
