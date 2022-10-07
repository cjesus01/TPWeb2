<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class ClothingView {
    private $smarty;

    public function __construct(){
         $this->smarty= new Smarty();
         $this->smarty->assign('BASE_URL', BASE_URL);
    } 
    public function ShowClothes($Clothing){
        $this->smarty->assign('Title','Clothing');
        $this->smarty->assign('clothing', $Clothing);
        $this->smarty->display('./templates/clothing.tpl');
    }
    public function ShowOneClothes($OneClothes){
        $this->smarty->assign('Title','One Clothes');
        $this->smarty->assign('OneClothes', $OneClothes);
        $this->smarty->display('./templates/oneclothes.tpl');
    }
    
    public function ShowError($message){
        $this->smarty->assign('message', $message);
        $this->smarty->display('./templates/error.tpl');
    }
    public function Homepage(){
        $this->smarty->assign('Title','Homepage');
        $this->smarty->display('./templates/homepage.tpl');
    }
    public function ShowClothesByCategory($Clothing,$Category){
        $this->smarty->assign('Clothing', $Clothing);
        $this->smarty->assign('Category',$Category);
        $this->smarty->assign('Title','Clothing');
        $this->smarty->display('./templates/clothing.tpl');
    }
}
