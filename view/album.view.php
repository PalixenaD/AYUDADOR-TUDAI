<?php

class AlbumView {
  public function renderHome($albumes) {
    require_once __DIR__ . '/templates/Albumes.phtml';
  }

  public function renderAlbum($album) {
    require_once __DIR__ . '/templates/AlbumList.phtml';
  }
}

?>
