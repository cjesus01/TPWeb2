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
    public function ReadCategories($category){
        $query=$this->db->prepare('SELECT id_tela FROM tela WHERE tipo_de_tela=?');
        $query->execute([$category]);
        $Clothing=$query->fetchAll(PDO::FETCH_OBJ);
        return $Clothing;
    }
    public function addCategory($descripcion, $lavado,$temperatura,$categoria,$img){
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
    public function updateCategories($categories, $lavado, $temperatura, $descripcion, $Id,$img){
        $query=$this->db->prepare("UPDATE tela SET `tipo_de_tela`='$categories', `descripcion`='$descripcion', `lavado_de_tela`='$lavado', `temperatura_de_lavado`='$temperatura',`imagen`='$img' WHERE id_tela=?");
        $query->execute([$Id]);
    }
    public function UpdateClothesImg($img,$Id){
        $query=$this->db->prepare("UPDATE tela SET `imagen`='$img' WHERE id_tela=?");
        $query->execute([$Id]);
    }
    public function deleteCategory($id){
        $query=$this->db->prepare("DELETE FROM tela WHERE id_tela=?");
        $query->execute([$id]);
    } 
    public function CategoriesId(){
        $query=$this->db->prepare('SELECT id_tela FROM tela');
        $query->execute();
        $CategoriesId=$query->fetchAll(PDO::FETCH_OBJ);
        return $CategoriesId;
    }
    public function getTipoDeTelaCategories(){
        $query=$this->db->prepare("SELECT tipo_de_tela FROM tela");
        $query->execute();
        $TipoDeTela=$query->fetchAll(PDO::FETCH_OBJ);
        return $TipoDeTela;
    }
    public function getTipoDeTelaAndImagenCategories(){
        $query=$this->db->prepare("SELECT tipo_de_tela,imagen FROM tela");
        $query->execute();
        $TipoDeTela=$query->fetchAll(PDO::FETCH_OBJ);
        return $TipoDeTela;
    }
}
?>