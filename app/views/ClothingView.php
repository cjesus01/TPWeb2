<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class ClothingView {
    private $smarty;

    public function __construct(){
         $this->smarty= new Smarty();
    } 
    public function ShowClothes($Clothing){
        $this->smarty->assign('prendas', $Clothing);
        $this->smarty->display('./templates/prendas.tpl');
    }
    public function ShowOneClothes($OneClothes){
        var_dump($OneClothes);
        echo '<ul>';
                echo '<li>Prenda:'.$OneClothes->prenda.'</li>';
                echo '<li>Sexo:'.$OneClothes->sexo.'</li>';
                echo '<li>Talla:'.$OneClothes->talla.'</li>';
                echo '<li>Color:'.$OneClothes->color.'</li>';
                echo '<li>Tipo de tela:'.$OneClothes->tipo_de_tela.'</li>';
                echo '<button><a href=Clothing/GetClothing>Volver</a></button>';
        echo '</ul>';
    }
    
    public function ShowError($mensaje){
        echo '<h1>'.$mensaje.'</h1>';
    }
}
