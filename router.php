<?php
require_once __DIR__ . '/app/controllers/Album.controller.php';
require_once __DIR__ . '/app/controllers/Artista.controller.php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

/**  TABLA DE RUTEO                             
 * /issues   ---> IssuesController::showAll();
 * /add      ---> IssuesController::add();
 * /delete ---> IssuesController::delete();
   
 **/

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new AlbumController();
        $controller->home();
        break;

   case 'album':
        $id = $params[1] ?? null;
        $controller = new AlbumController();
        $controller->mostrarAlbum($id);
        break;

   case 'artistas':
         $controller = new ArtistaController();
         $controller-> mostrarArtista();
         break;

   case 'artista'
         $id = $params[1] ?? null;
         $controller = new ArtistaController();
         $controller->mostrarArtista($id);
         break;
         
   case 'albumsPorArtista'
         $controller = new ArtistaController();
         $controller->seleccionarArtista($params[1]);
         break;
         
   
    case 'add':
        $controller = new IssuesController();
        $controller->add();
        break;
    
    case 'delete':
        $controller = new IssuesController();
        $controller->delete($params[1]);
        break;

    default:
        echo '404 error';
        break;
}
