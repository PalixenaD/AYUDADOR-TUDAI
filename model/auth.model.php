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


public function get($id){
    $query = $this->db->prepare('SELECT * FROM usuario WHERE id = ?' );
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_OBJ);

}

 public function getByEmail($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?')
        $query->([$email]);
     return $query->fetch(PDO::FETCH_OBJ);
            
 }


        
        
}
