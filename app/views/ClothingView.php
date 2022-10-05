<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class ClothingView {
    private $smarty;

    public function __construct(){
         $this->smarty= new Smarty();
         $this->smarty->assign('BASE_URL', BASE_URL);
    } 
    public function ShowClothes($Clothing){
        $this->smarty->assign('prendas', $Clothing);
        $this->smarty->display('./templates/prendas.tpl');
    }
    public function ShowOneClothes($OneClothes){
        $this->smarty->assign('OneClothes', $OneClothes);
        $this->smarty->display('./templates/oneclothes.tpl');
    }
    
    public function ShowError($mensaje){
        echo '<h1>'.$mensaje.'</h1>';
    }
    public function Homepage(){
        // $this->smarty->assign('Title','Homepage');
        $this->smarty->display('./templates/homepage.tpl');
    }
}
