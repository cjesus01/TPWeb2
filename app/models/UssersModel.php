<?php
    class UssersModel{
        private $db;
        public function __construct(){
            $this->db = $this->conection();
        }

        public function conection(){
            $db = new PDO ('mysql:host=localhost;
                            dbname=ussers;charset=utf8',
                            'root','');
            return $db;
        }
        public function AddUsser($nombre, $Mail, $contraseña){
            $query = $this->db->prepare("INSERT INTO usser(nombre,Mail,contraseña) VALUES (?,?,?)");
            $query->execute([$nombre, $Mail, $contraseña]);
        }
        public function GetUssers(){
            $query= $this->db->prepare("SELECT * FROM usser");
            $query->execute();
            $Ussers=$query->fetchAll(PDO::FETCH_OBJ);
            return $Ussers;
        }
    }