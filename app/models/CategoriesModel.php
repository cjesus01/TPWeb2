<?php
class CategoriesModel{
    private $db;

    public function __construct(){
        $this->db = $this->connect();
    }

    public function connect(){
        $db = new PDO ('mysql:host=localhost;
                        dbname=indumentaria;
                        charset=utf8','root','');
        return $db;
    }

    public function getCategoriesAll(){
        $query=$this->db->prepare('SELECT * FROM tela');
        $query->execute();
        $Categories = $query-> fetchAll(PDO::FETCH_OBJ);
        return $Categories;
    }
    public function getCategoriesOnlyIdAndTipoDeTela(){
        $query=$this->db->prepare("SELECT id_tela,tipo_de_tela FROM tela");
        $query->execute();
        $Categories=$query->fetchAll(PDO::FETCH_OBJ);
        return $Categories;
    }
    public function getCategoriesOnlyTipoDeTela(){
        $query=$this->db->prepare("SELECT tipo_de_tela FROM tela");
        $query->execute();
        $Categories=$query->fetchAll(PDO::FETCH_OBJ);
        return $Categories;
    }
    public function ReadCategories($category){
        $query=$this->db->prepare('SELECT id_tela FROM tela WHERE tipo_de_tela=?');
        $query->execute([$category]);
        $Clothing=$query->fetchAll(PDO::FETCH_OBJ);
        return $Clothing;
    }
    public function AddCategory($descripcion, $lavado,$temperatura,$categoria,$img=NULL){
        if($img!=NULL){
            $query=$this->db->prepare("INSERT INTO tela(tipo_de_tela,descripcion,lavado_de_tela,temperatura_de_lavado,imagen) VALUES (?,?,?,?,?)");
            $query->execute([$categoria,$descripcion,$lavado,$temperatura,$img]);
        }
        else{
            $query=$this->db->prepare("INSERT INTO tela(tipo_de_tela,descripcion,lavado_de_tela,temperatura_de_lavado) VALUES (?,?,?,?)");
            $query->execute([$categoria,$descripcion,$lavado,$temperatura]);
        }
    }
    public function getCategoriesOne($id){
        $query=$this->db->prepare("SELECT * FROM tela WHERE id_tela=?");
        $query->execute([$id]);
        $Categories=$query->fetch(PDO::FETCH_OBJ);
        return $Categories;
    }
    public function UpdateCategories($categories, $lavado, $temperatura, $descripcion, $Id,$img=NULL){
        $query=$this->db->prepare("UPDATE tela SET `id_tela`= '$Id', `tipo_de_tela`='$categories', `descripcion`='$descripcion', `lavado_de_tela`='$lavado', `temperatura_de_lavado`='$temperatura',`imagen`='$img' WHERE id_tela=?");
        $query->execute([$Id]);
    }
    public function DeleteCategory($id){
        $query=$this->db->prepare("DELETE FROM tela WHERE id_tela=?");
        $query->execute([$id]);
    } 
    public function CategoriesId(){
        $query=$this->db->prepare('SELECT id_tela FROM tela');
        $query->execute();
        $CategoriesId=$query->fetchAll(PDO::FETCH_OBJ);
        return $CategoriesId;
    }
}
?>