<?php
    class UssersModel{
        private $db;
        public function __construct(){
            $this->db = $this->conection();
        }

        public function conection(){
            $db = new PDO ('mysql:host=localhost;
                            dbname=indumentaria;charset=utf8',
                            'root','');
            return $db;
        }
        public function AddUsser($nombre, $Mail, $contraseña){
            $query = $this->db->prepare("INSERT INTO usser(nombre,Mail,contraseña) VALUES (?,?,?)");
            $query->execute([$nombre, $Mail, $contraseña]);
        }
        public function GetUsser($nombre){
            $query= $this->db->prepare("SELECT * FROM usser WHERE nombre=?");
            $query->execute([$nombre]);
            $Usser=$query->fetch(PDO::FETCH_OBJ);
            return $Usser;
        }
        public function getNamessers(){
            $query=$this->db->prepare("SELECT nombre FROM usser");
            $query->execute();
            $Ussers=$query->fetchAll(PDO::FETCH_OBJ);
            return $Ussers;
        }
        public function getMailUssers(){
            $query=$this->db->prepare("SELECT Mail FROM usser");
            $query->execute();
            $Ussers=$query->fetchAll(PDO::FETCH_OBJ);
            return $Ussers;
        }
    }