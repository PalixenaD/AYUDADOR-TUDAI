<?php
    class GuardMiddleware {
        public function run($req) {
            if (!$req->usuario) {
                header("Location: ". BASE_URL . "login_form");
                die();
            }
            return $req;
        }
    }
