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
        $query=$this->db->prepare('SELECT tipo_de_tela FROM tela');
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
}
?>