<?php
class ClothingView {
    public function ShowClothes($Clothing){
        echo '<ul>';
        foreach ($Clothing as $Clothes){
            echo '<li>'.$Clothes->Sexo.'</li>';
            echo '<li>'.$Clothes->Talla.'</li>';
            echo '<li>'.$Clothes->Color.'</li>';
            echo '<li>'.$Clothes->Tipo_de_prenda.'</li>';
            echo '<li>'.$Clothes->Tipo_de_tela.'</li>';
            echo '<li>'.$Clothes->Descripcion.'</li>';
        }
        echo '</ul>';
    }
}
