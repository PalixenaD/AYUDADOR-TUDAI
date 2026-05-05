<?php

class ArtistaModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web2;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM artista');
        $query->execute();
        $artista = $query->fetchAll(PDO::FETCH_OBJ);
        return $artista;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM artista WHERE id_artista = ?');
        $query->execute([$id]);
        $artista = $query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }

     public function insert($nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen, $id_artista) {
        $query = $this->db->prepare('INSERT INTO `artista`(`nombre_artista`, `fecha_nacimiento`, `fecha_fallecimiento`, `lugar_origen`, ´id_artista´) VALUES (?,?,?,?,?)');
        $query->execute([$nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen, $id_artista]);
        return $this->db->lastInsertId();
    }

    public function delete($id_artista) {
        $query = $this->db->prepare('DELETE FROM `artista` WHERE id_artista = ?');
        $query->execute([$id_artista]);
        return $this->db->rowCount();
    }

    public function update($nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen, $id_artista) {
        $query = $this->db->prepare('UPDATE `artista` SET `nombre_artista`=?,`fecha_nacimiento`=?,`fecha_fallecimiento`=?,`lugar_origen`=?,´id_artista´=? WHERE id_artista = ?');
        $query->execute([$nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen, $id_artista]);
        return $this->db->rowCount();
    }    
}
