<?php 
require_once __DIR__ . '/../models/artista.php';
require_once __DIR__ . '/../views/artista.view.php';
require_once __DIR__ . '/../views/error.view.php';

class ArtistaController {
    private $model;
    private $view;
    private $errorView;

    public function __construct() {
        $this->model = new ArtistaModel();
        $this->view = new ArtistaView();
        $this->errorView = new ErrorView();


    public function  mostrarArtistas($req) {
      $artistas = $this->model->getAll();
      $this->view->setUser($req->user);  
      $this->view->renderArtistas($artistas);
    }

      public function seleccionarArtista($req, $id) {
        $albumes = $this->model->get($id);  
        $this->view->showAlbumsporArtista($albumes);
    }

 public function addArtista($req) {       
     
        if (
            !isset($_POST['nombre_artista']) || empty($_POST['nombre_artista']) ||
            !isset($_POST['fecha_nacimiento']) || empty($_POST['fecha_nacimiento']) ||
            !isset($_POST['fecha_fallecimiento']) || empty($_POST['fecha_fallecimiento']) ||
            !isset($_POST['lugar_origen']) || empty($_POST['lugar_origen'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
        }


        $nombre_artista = $_POST['nombre_artista'];
        $fecha_nacimiento= $_POST['fecha_nacimiento'];
        $fecha_fallecimiento = $_POST['fecha_fallecimiento'];
        $lugar_origen = $_POST['lugar_origen'];
        

        $id = $this->model->insert($nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen);

        if (empty($id)) {
            return $this->errorView->renderError("Error al agregar la artista. Intente nuevamente.");
        }
        
        header("Location: " . BASE_URL );        
    }

    public function deleteArtista($req) {
        $id = $req->id;
        $artista = $this->model->get($id);

        if (!$artista) {
            return $this->errorView->renderError("No existe el artista seleccionado");
        }

        $this->model->delete($id);

        header("Location: " . BASE_URL );
    }


 public function editArtista($req) {       

        if (
            !isset($_POST['nombre_artista']) || empty($_POST['nombre_artista']) ||
            !isset($_POST['fecha_nacimiento']) || empty($_POST['fecha_nacimiento']) ||
            !isset($_POST['fecha_fallecimiento']) || empty($_POST['fecha_fallecimiento']) ||
            !isset($_POST['lugar_origen']) || empty($_POST['lugar_origen'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
        }


        $id_artista = $_POST['id_artista'];
        $nombre_artista = $_POST['nombre_artista'];
        $fecha_nacimiento= $_POST['fecha_nacimiento'];
        $fecha_fallecimiento = $_POST['fecha_fallecimiento'];
        $lugar_origen = $_POST['lugar_origen'];
        

        $this = $this->model->update($id_artista, $nombre_artista, $fecha_nacimiento, $fecha_fallecimiento, $lugar_origen);

        if (empty($id)) {
            return $this->errorView->renderError("Error al agregar la artista. Intente nuevamente.");
        }
        
        header("Location: " . BASE_URL );        
    }


    public function mostrarFormAddArtista($req) {
        $this->view->mostrarFormAdd();
    }

    public function mostrarFormEditArtista($req, $id_artista){
        $artista = $this->model->get($id_artista);
        $this->view->mostrarFormEdit($artista);
    }
}

   








        
        


