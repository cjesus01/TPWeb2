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
            $query=$this->db->prepare('SELECT prenda,tipo_de_tela,id FROM prenda JOIN tela ON prenda.id_tela = tela.id_tela');
            $query->execute();
            $Clothing = $query->fetchAll(PDO::FETCH_OBJ);
            return $Clothing;
        }
        public function getAllByCategory($category){
            $query=$this->db->prepare('SELECT prenda,tipo_de_tela,id FROM prenda JOIN tela ON prenda.id_tela = tela.id_tela WHERE tipo_de_tela=?');
            $query->execute([$category]);
            $Clothing = $query->fetchAll(PDO::FETCH_OBJ);
            return $Clothing;
        }
        public function getOneClothes($id){
            $query=$this->db->prepare('SELECT * FROM prenda JOIN tela ON prenda.id_tela=tela.id_tela WHERE id=?');
            $query->execute([$id]);
            $Clothing=$query->fetch(PDO::FETCH_OBJ);
            return $Clothing;
        } 
        public function deleteClothing($id){
            $query=$this->db->prepare('DELETE FROM prenda WHERE id=?');
            $query->execute([$id]);
        }
        public function AddClothing($prenda,$sexo,$color,$talla,$category,$img){
            $query=$this->db->prepare('INSERT INTO prenda(prenda,sexo,color,talla,id_tela,imagen_prenda) VALUES (?,?,?,?,?,?)');
            $query->execute([$prenda,$sexo,$color,$talla,$category,$img]);
        }
        public function updateClothes($prenda, $color, $talla, $sexo, $category, $Id, $img){
                $query=$this->db->prepare("UPDATE prenda SET `sexo`=?, `talla`=?, `color`=?, `prenda`=?, `id_tela`=?,`imagen_prenda`=? WHERE id=?");
                $query->execute([$sexo,$talla,$color,$prenda,$category,$img,$Id]);
        }
        public function ClothingId(){
            $query=$this->db->prepare("SELECT id FROM prenda");
            $query->execute();
            $Clothing=$query->fetchAll(PDO::FETCH_OBJ);
            return $Clothing;
        }
        public function CategoriesIdTela(){
            $query=$this->db->prepare('SELECT id_tela FROM prenda');
            $query->execute();
            $Idtela = $query->fetchAll(PDO::FETCH_OBJ);
            return $Idtela;
        }

    public function getAllClothing(){
        $query=$this->db->prepare('SELECT * FROM prenda JOIN tela ON prenda.id_tela=tela.id_tela');
        $query->execute();
        $Clothing = $query->fetchAll(PDO::FETCH_OBJ);
        return $Clothing;
    }
    public function getOrderByColumn($columna,$orden){
        $query=$this->db->prepare("SELECT * FROM prenda JOIN tela ON prenda.id_tela=tela.id_tela ORDER BY $columna $orden");
        $query->execute();
        $clothing= $query->fetchAll(PDO::FETCH_OBJ);
        return $clothing;
    }
    public function getPaginationClothing($page,$elementNumbers){
        $query=$this->db->prepare("SELECT * FROM prenda JOIN tela ON prenda.id_tela=tela.id_tela ORDER BY id LIMIT $page,$elementNumbers");
        $query->execute();
        $clothing=$query->fetchAll(PDO::FETCH_OBJ);
        return $clothing;
    }
    
} 
    
?>