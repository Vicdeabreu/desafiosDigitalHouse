<?php 

  include_once "models/Login.php";

  class LoginController{
    public function acao($rotas){
      switch($rotas){
        case "login":
          $this->viewLogin();
        break;
      }
    }

    private function viewLogin(){
      include "views/login.php";
    }
  }

?>