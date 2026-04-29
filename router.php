<?php
require_once __DIR__ . '/app/controllers/issues.controller.php';

// define la base URL del sitio
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

/**  TABLA DE RUTEO                             
 * /issues   ---> IssuesController::showAll();
 * /add      ---> IssuesController::add();
 * /delete ---> IssuesController::delete();
   
 **/

// accion por default
$action = 'home';

// leo la accion que viene por parámetro
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: staff/juan --> ['staff', juan]
$params = explode('/', $action);

// rutea según la acción
switch ($params[0]) {
    case 'home':
        $controller = new IssuesController();
        $controller->showAll();
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
