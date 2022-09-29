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
            $query=$this->db->prepare('SELECT * FROM ropa JOIN tela ON ropa.id_tela = tela.id_tela');
            $query->execute();
            $Clothing = $query->fetchAll(PDO::FETCH_OBJ);
            return $Clothing;
        }
    }
    
?>