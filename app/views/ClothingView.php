<?php
class ClothingView {
    public function ShowClothes($Clothing){
        echo '<ul>';
        foreach ($Clothing as $Clothes){
            echo '<li>'.$Clothes->sexo.'</li>';
            echo '<li>'.$Clothes->talla.'</li>';
            echo '<li>'.$Clothes->color.'</li>';
            echo '<li>'.$Clothes->prenda.'</li>';
            echo '<li>'.$Clothes->tipo_de_tela.'</li>';
        }
        echo '</ul>';
    }
}
