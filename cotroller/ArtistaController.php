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


   public function  mostrarArtista() {
       $artista = $this->model->get($id);
     
  if ($artista === null) {
            return $this->errorView->renderError("El artista no esta disponible");
        }

        $this->view->renderArtista($artista);
    }



      public function seleccionarArtista($id) {
        $albumes = $this->model->get($id);

          if (empty($albumes)) {
            return $this->errorView->renderError("No hay albumes de este artista");
        }
   
        $this->view->showAlbumsporArtista($albumes);
    }
      
    }










        
        


