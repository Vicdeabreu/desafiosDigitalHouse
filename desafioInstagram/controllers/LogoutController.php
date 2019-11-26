<?php 

  class LogoutController{
    public function acao($rotas){
      switch($rotas){
        case "logout":
          $this->viewLogout();
        break;
      }
    }
    private function viewLogout(){
      include "views/logout.php";
    }
  }

?>