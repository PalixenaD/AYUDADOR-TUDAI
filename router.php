<?php
require_once __DIR__ . '/app/controllers/Album.controller.php';
require_once __DIR__ . '/app/controllers/Artista.controller.php';

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
        $id = $params[1] ?? null;
        $controller = new AlbumController();
        $controller->mostrarAlbum($req, $id);
        break;

   case 'artistas':
         $controller = new ArtistaController();
         $controller-> mostrarArtistas();
         break;
         
   case 'albumsPorArtista'
         $controller = new ArtistaController();
         $id = $params[1] ?? null;

         if ($id === null) {
             echo "Falta el id del artista";
         break;
         }

         $controller->seleccionarArtista($id);
         break;
         
         
    //PURA CACAAAAA
    case 'addArtista':
        $req = (new GuardMiddleware())->run($req);
        $controller = new ArtistaController();
        $controller->addArtista($req);
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
        $controller->editArtista($req);
        break;


    default:
        echo '404 error';
        break;
}
