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
    public function ReadCategories($category){
        $query=$this->db->prepare('SELECT id_tela FROM tela WHERE tipo_de_tela=?');
        $query->execute([$category]);
        $Clothing=$query->fetchAll(PDO::FETCH_OBJ);
        return $Clothing;
    }
    public function AddCategorie($descripcion, $lavado,$temperatura,$categoria){
        $query=$this->db->prepare("INSERT INTO tela(tipo_de_tela,descripcion,lavado_de_tela,temperatura_de_lavado) VALUES (?,?,?,?)");
        $query->execute([$categoria,$descripcion,$lavado,$temperatura]);
    }

    public function getCategoriesOne($id){
        $query=$this->db->prepare("SELECT * FROM tela WHERE id_tela=?");
        $query->execute([$id]);
        $Categories=$query->fetch(PDO::FETCH_OBJ);
        return $Categories;
    }
    public function UpdateCategories($categories, $lavado, $temperatura, $descripcion, $Id){
        $query=$this->db->prepare("UPDATE tela SET `id_tela`= '$Id', `tipo_de_tela`='$categories', `descripcion`='$descripcion', `lavado_de_tela`='$lavado', `temperatura_de_lavado`='$temperatura' WHERE id_tela=?");
        $query->execute([$Id]);
    }
}
?>