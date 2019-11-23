<?php 

  include_once "models/Login.php";

  class LoginController{
    public function acao($rotas){
      switch($rotas){
        case "login":
          $this->viewLogin();
        break;
        case "logar":
          $this->logarUsuario();
        break;
      }
    }

    private function viewLogin(){
      include "views/login.php";
    }

    private function logarUsuario(){
      if(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){
        header("Location: posts");
      }
    }

  }

?>