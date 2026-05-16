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

        $this->view->renderAlbum($album);
    }

    public function addAlbum($req) {       
        
        if (
            !isset($_POST['nombre_album']) || empty($_POST['nombre_album']) ||
            !isset($_POST['genero']) || empty($_POST['genero']) ||
            !isset($_POST['fecha_lanzamiento']) || empty($_POST['fecha_lanzamiento']) ||
            !isset($_POST['duracion_minutos']) || empty($_POST['duracion_minutos']) ||
            !isset($_POST['cantidad_canciones']) || empty($_POST['cantidad_canciones'] ||
            !isset($_POST['imagen']) || empty($_POST['imagen']) ||
            !isset($_POST['id_artista']) || empty($_POST['id_artista'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
        }


        $nombre_album = $_POST['nombre_album'];
        $genero = $_POST['genero'];
        $fecha_lanzamiento = $_POST['fecha_lanzamiento'];
        $duracion_minutos = $_POST['duracion_minutos'];
        $cantidad_canciones = $_POST['cantidad_canciones'];
        $imagen = $_POST['imagen'];
        $id_artista = $_POST['id_artista'];
        

  
        $id = $this->model->insert($nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $imagen, $id_artista);

        if (empty($id)) {
            return $this->errorView->renderError("Error al agregar el album. Intente nuevamente.");
        }
        
        
        header("Location: " . BASE_URL );        
    }

    public function deleteAlbum($req) {
        $id = $req->id;
        $album = $this->model->get($id);

        if (!$album) {
            return $this->errorView->renderError("No existe el album seleccionado.");
        }

        $this->model->delete($id);

        header("Location: " . BASE_URL );
    }


    public function editAlbum($req) {       
        
        if (
            !isset($_POST['nombre_album']) || empty($_POST['nombre_album']) ||
            !isset($_POST['genero']) || empty($_POST['genero']) ||
            !isset($_POST['fecha_lanzamiento']) || empty($_POST['fecha_lanzamiento']) ||
            !isset($_POST['duracion_minutos']) || empty($_POST['duracion_minutos']) ||
            !isset($_POST['cantidad_canciones']) || empty($_POST['cantidad_canciones'] ||
            !isset($_POST['imagen']) || empty($_POST['imagen']) ||
            !isset($_POST['id_artista']) || empty($_POST['id_artista'])                                              
           ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
           }


        $id_album = $_POST['id_album'];
        $nombre_album = $_POST['nombre_album'];
        $genero = $_POST['genero'];
        $fecha_lanzamiento = $_POST['fecha_lanzamiento'];
        $duracion_minutos = $_POST['duracion_minutos'];
        $cantidad_canciones = $_POST['cantidad_canciones'];
        $imagen = $_POST['imagen'];
        $id_artista = $_POST['id_artista'];
        

        $this = $this->model->editArtista($id_album, $nombre_album, $genero, $fecha_lanzamiento, $duracion_minutos, $cantidad_canciones, $imagen, $id_artista);

        if (empty($id)) {
            return $this->errorView->renderError("Error al agregar el album. Intente nuevamente.");
        }
        
        header("Location: " . BASE_URL );        
    }

     public function mostrarFormAddAlbum() {
        $this->view->mostrarFormAdd();
    }

    public function mostrarFormEditAlbum($id_album){
        $album = $this->model->get($id_album);
        $this->view->mostrarFormEdit($album);
    }
}
