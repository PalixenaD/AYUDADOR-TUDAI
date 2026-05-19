<?php

    class AuthModel {
        private $db;

        public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web2;charset=utf8', 'root', '');
        }

    public function getUsuario($nombre_usuario) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre_usuario = ?');
        $query->execute([$nombre_usuario]);
        $usuario = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuario;
    }     
        
}
