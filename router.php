<?php
require_once __DIR__ . '/app/controllers/album.controller.php';
require_once __DIR__ . '/app/controllers/artista.controller.php';
require_once __DIR__ . '/app/views/error.view.php';
require_once __DIR__ . '/app/middlewares/session.middleware.php';
require_once __DIR__ . '/app/middlewares/guard.middleware.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$req = new StdClass();
$req = (new SessionMiddleware())->run($req);

switch ($params[0]) {
    case 'home':
        $controller = new AlbumController();
        $controller->home($req);
        break;

   case 'album':
        $req->id = $params[1] ?? null;
        $controller = new AlbumController();
        $controller->mostrarAlbum($req);
        break;

   case 'artistas':
         $controller = new ArtistaController();
         $controller-> mostrarArtistas($req);
         break;
         
   case 'albumsPorArtista':
         $req->id = $params[1] ?? null;
         $controller = new ArtistaController();
    
         if ($req->id === null) {
           return $this->errorView->renderError("No se encuentra ese artista");
         } else {
           $controller->seleccionarArtista($req);
           break;
         }

   case 'login_form':
        $controller = new AuthController();
        $controller->mostrarFormLogin($req);
        break;

   case 'login':
        $controller = new AuthController();
        $controller->login($req);
        break;

   case 'logout':
        $controller = new AuthController();
        $controller->logout($req);
        break; 
 

   case 'addAlbum':
        $req = (new GuardMiddleware())->run($req);
        $controller = new AlbumController();
        $controller->addAlbum($req);
        break;

   case 'addFormAlbum':
        $req = (new GuardMiddleware())->run($req);
        $controller = new AlbumController();
        $controller->mostrarFormAddAlbum($req);
        break;
    
   case 'deleteAlbum':
        $req = (new GuardMiddleware())->run($req);
        $controller = new AlbumController();
        $req->id = $params[1];
        $controller->deleteAlbum($req);
        break;

   case 'editAlbum':
        $req = (new GuardMiddleware())->run($req);
        $controller = new AlbumController();
        $req->id = $params[1];
        $controller->editAlbum($req);
        break;

   case 'editFormAlbum':
        $req = (new GuardMiddleware())->run($req);
        $controller = new AlbumController();
        $req->id = $params[1];
        $controller->mostrarFormEditAlbum($req);
        break;


    case 'addArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $controller->addArtista($req);
        break;
    
    case 'addFormArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $controller->mostrarFormAddArtista($req);
        break;
    
    case 'deleteArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $req->id = $params[1];
        $controller->deleteArtista($req);
        break;

    case 'editArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $req->id = $params[1];
        $controller->editArtista($req);
        break;
    
    case 'editFormArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $req->id = $params[1];
        $controller->mostrarFormEditArtista($req);
        break;

    default:
        echo '404 error';
        break;
}
