<?php

class ArtistaView {
    public function renderArtistaS($artistas) {
        require_once  'Views/templates/SeleccionList.phtml';
    }

    public function renderArtista($artista) {
        require_once  'Views/templates/JugadoresPorSeleccionList.phtml';
    }

    public function showAlbumsporArtista ($albumes) {
        require_once  'Views/templates/JugadoresPorSeleccionList.phtml';
    }
}


?>
