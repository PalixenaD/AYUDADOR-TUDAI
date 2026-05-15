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


    public function  mostrarArtistas() {
      $artistas = $this->model->getAll();
      $this->view->renderArtistas($artistas);
    }

      public function seleccionarArtista($id) {
        $albumes = $this->model->get($id);

          if (empty($albumes)) {
            return $this->errorView->renderError("No hay albumes de este artista");
        }
   
        $this->view->showAlbumsporArtista($albumes);
    }

 public function addArtista($req) {       
        // valida la entrada de usuario
        if (
            !isset($_POST['nombre_artista']) || empty($_POST['nombre_artista']) ||
            !isset($_POST['fecha_nacimiento']) || empty($_POST['fecha_nacimiento']) ||
            !isset($_POST['fecha_fallecimiento']) || empty($_POST['fecha_fallecimiento']) ||
            !isset($_POST['lugar_origen']) || empty($_POST['lugar_origen']) ||
            !isset($_POST['type']) || empty($_POST['type'])
        ) {
            return $this->errorView->renderError("Por favor, complete todos los campos.");
        }


        $nombre_artista = $_POST['nombre_artista'];
        $fecha_nacimiento= $_POST['fecha_nacimiento'];
        $fecha_fallecimiento = $_POST['fecha_fallecimiento'];
         $lugar_origen = $_POST['lugar_origen'];
        $type = $_POST['type'];
        $status = 'TODO';

  // inserta la nueva issue en la DB
        $id = $this->model->insert( $nombre_artista,  $fecha_nacimiento,$fecha_fallecimiento,$lugar_origen  $type, $status);

        if (empty($id)) {
            return $this->errorView->renderError("Error al agregar la artista. Intente nuevamente.");
        }
        
        // redirige a la lista de issues
        header("Location: " . BASE_URL );        
    }

          public function deleteArtista($req) {
        $id = $req->id;
        $task = $this->model->get($id);

        if (!$task) {
            return $this->errorView->renderError("No existe el artista con el id=$id");
        }

        $this->model->delete($id);

        header("Location: " . BASE_URL );
    }

        
    }










        
        


