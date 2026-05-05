<?php

class AlbumModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web2;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM album');
        $query->execute();
        $albumes = $query->fetchAll(PDO::FETCH_OBJ);
        return $albumes;
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM album WHERE id_album = ?');
        $query->execute([$id]);
        $album = $query->fetch(PDO::FETCH_OBJ);
        return $album;
    }

     public function insert($nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $id_artista) {
        $query = $this->db->prepare('INSERT INTO `album`(`nombre_album`, `genero`, `fecha_lanzamiento`, `duracion_minutos`, ´cantidad_canciones´, ´id_artista´) VALUES (?,?,?,?,?,?)');
        $query->execute([$nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $id_artista]);
        return $this->db->lastInsertId();
    }

    public function delete($id_album) {
        $query = $this->db->prepare('DELETE FROM `album` WHERE id_album = ?');
        $query->execute([$id_album]);
        return $this->db->rowCount();
    }

    public function update($id_album, $nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $id_artista) {
        $query = $this->db->prepare('UPDATE `album` SET `nombre_album`=?,`genero`=?,`fecha_lanzamiento`=?,`duracion_minutos`=?,´cantidad_canciones´=?,´id_artista´=? WHERE id_album = ?');
        $query->execute([$nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $id_artista]);
        return $this->db->rowCount();
    }    
}


