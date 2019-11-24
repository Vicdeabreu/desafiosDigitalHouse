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
      if($_POST){
        $usuario = $_POST['nomeusuario'];
        $senha = md5($_POST['senha']); // Armazenando os dados do POST dentro de uma variável
      if($usuario == mysqli_query($query)){
        if(password_verify($senha, mysqli_query($query))){
          session_start();
          $_SESSION['logado'] = TRUE;
          header("Location:posts");
        } else {
          echo "Usuario ou senha inválidos";
        }
      } echo "Usuario ou senha inválidos";
      }
    }
  }


     // if($resultado = $mysqli->query($query)) {
    //   while($row = $resultado->fetch_array) {

    //     $userok = $row['nomeusuario'];
    //     $passok = $row['senha'];
    //   }
    // }

    // if(isset($usuario) && isset($senha)) {

    //   if($usuario == $userok && $senha == $passok) {

    //     session_start();
    //     $_SESSION['logado'] = TRUE;
    //     header("Location: posts");
    //   }
    //   else {
    //     Header("Location: login");
    //   }
    // }

?>