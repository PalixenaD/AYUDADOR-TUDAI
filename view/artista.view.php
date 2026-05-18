<?php

class ArtistaView {
    public function renderArtistas($artistas) {
        require_once  'Views/templates/Artistas.phtml';
    }


    public function showAlbumsporArtista ($albumes) {
        require_once  'Views/templates/AlbumPorArtista.phtml';
    }
}


?>
