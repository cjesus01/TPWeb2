<?php
class ClothingView {
    public function ShowClothes($Clothing){
        echo '<ul>';
        foreach ($Clothing as $Clothes){
            // echo '<li>'.$Clothes->sexo.'</li>';
            // echo '<li>'.$Clothes->talla.'</li>';
            // echo '<li>'.$Clothes->color.'</li>';
            echo '<li>Prenda:'.$Clothes->prenda.'</li>';
            echo '<li>'.$Clothes->tipo_de_tela.'</li>';
            echo '<button><a href=Clothing/GetClothing/'.$Clothes->id.'>Ver detalles</a></button>';
        }
        echo '</ul>';
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
