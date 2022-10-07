<?php
    class ClothingModel{
        private $db;
        public function __construct(){
            $this->db = $this->connect();
        }
        public function connect(){
            $db = new PDO(
                'mysql:host=localhost;
                 dbname=indumentaria;
                 charset=utf8','root','');
            return $db;
        }
        public function getAll(){
            $query=$this->db->prepare('SELECT * FROM prenda JOIN tela ON prenda.id_tela = tela.id_tela');
            $query->execute();
            $Clothing = $query->fetchAll(PDO::FETCH_OBJ);
            return $Clothing;
        }
        public function getOneClothes($id){
            $query=$this->db->prepare('SELECT * FROM prenda JOIN tela ON prenda.id_tela=tela.id_tela WHERE id=?');
            $query->execute([$id]);
            $Clothing=$query->fetch(PDO::FETCH_OBJ);
            return $Clothing;
        } 
        public function DeleteClothing($id){
            $query=$this->db->prepare('DELETE FROM prenda WHERE id=?');
            $query->execute([$id]);
        }
        public function AddClothing($prenda,$sexo,$color,$talla,$category){
            $query=$this->db->prepare('INSERT INTO prenda(prenda,sexo,color,talla,id_tela) VALUES (?,?,?,?,?)');
            $query->execute([$prenda,$sexo,$color,$talla,$category]);
        }
    }
    
?>