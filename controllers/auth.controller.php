
<?php
require_once __DIR__ . '/../models/auth.model.php';
require_once __DIR__ . '/../views/auth.view.php';
require_once __DIR__ . '/../views/error.view.php';

class AuthController {
    private $view;
    
    public function __construct() {
        $this->model = new AuthModel();
        $this->view = new AuthView();
        $this->errorView = new ErrorView();
    }
    
    public function mostrarFormLogin($req){
        $this->view->showForm();
    }

    public function login($req){
        if(empty($_POST["usuario"]) || empty($_POST["password"]))
            return $this->view->showForm();

        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $user = $this->model->getUsuario($usuario);

        if(!$user) {
            return $this->errorView->renderError("Usuario o contraseña incorrecta");
        }

        if(!password_verify($password, $user->password)) {
            return $this->errorView->renderError("Usuario o contraseña incorrecta");
        }

        $_SESSION["id"] = $user->id_usuario;
        $_SESSION["usuario"] = $user->nombre_usuario;

        header("Location: ". BASE_URL);
    }

    public function logout($req){
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
