<?php
    class SessionMiddleware {
        public function run($req) {
            if (isset($_SESSION["id"])) {
                $req->usuario = new StdClass();
                $req->usuario->id = $_SESSION["id"];
                $req->usuario->email = $_SESSION["email"];
            } else {
                $req->usuario = null;
            }
            return $req;
        }
    }
