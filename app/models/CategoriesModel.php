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
}
?>