<?php

class ArtistaView {
    public function renderArtistas($artistas) {
        require_once  __DIR__   '/templates/Artistas.phtml';
    }


    public function showAlbumsporArtista ($albumes) {
        require_once  __DIR__  '/templates/AlbumPorArtista.phtml';
    }
}


?>
