<?php
require_once __DIR__ . '/../models/album.model.php';
require_once __DIR__ . '/../views/album.view.php';
require_once __DIR__ . '/../views/error.view.php';

class AlbumController {
    private $model;
    private $view;
    private $errorView;

    public function __construct() {
        $this->model = new AlbumModel();
        $this->view = new AlbumView();
        $this->errorView = new ErrorView();
    }

    public function home() {
        $albumes = $this->model->getAll();

        
        $this->view->renderHome($albumes);
    }

    public function mostrarAlbum($id) {
        $album = $this->model->get($id);

        if ($album === null) {
            return $this->errorView->renderError("El album no existe");
        }

        $this->view->renderAlbum($Album);
    }
}

