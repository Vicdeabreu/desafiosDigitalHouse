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
      $nomeUsuario = $_POST['username'];
      session_start();
      $login = new Login();
      $usuarios = $login->loginUsuario($nomeUsuario);
  
      if($usuarios != false){ 
          if($_POST['username'] == $usuarios['nomeUsuario'] && password_verify($_POST['senha'], $usuarios['senha'])) {
            $_SESSION['nomeUsuario'] = $usuarios['nomeUsuario'];
            $_SESSION['nome'] = $usuarios['nome'];
            $_SESSION['img'] = $usuarios['img'];
            $_SESSION['id'] = $usuarios['id'];
            header('Location:posts');
            exit;
          } else {
            $_SESSION['loginError'] = "Usuário ou senha inválidos";
            header('Location:login');
          }
      }else{
        $_SESSION['loginError'] = "Usuário ou senha inválidos";
        header('Location:login');
      }
    }



    // Intentos falhidos de Login //

    //   if($usuario == mysqli_query($query)){
    //     if(password_verify($senha, mysqli_query($query))){
    //       session_start();
    //       $_SESSION['logado'] = TRUE;
    //       header("Location:/desafioInstagram/posts");
    //     } else {
    //       echo "Usuario ou senha inválidos";
    //     }
    //   } echo "Usuario ou senha inválidos";
    //   }
    // }
  


  // private function checkUser() {
  //   session_start();
  //   $login = new User;
  //   $users = $login->listUsers();
  //   $_REQUEST['users'] = $users;
  //   foreach ($users as $user) {
  //       if ($_POST['username'] == $user['username'] && password_verify($_POST['userpassword'],$user['userpassword'])) {
  //           $_SESSION['username'] = $user['username'];
  //           header('Location:/DH_fakeInstagram/posts');
  //       break;
  //       } else {
  //           $_SESSION['loginError'] = "Usuário ou senha incorretos";  
  //           header('Location:/DH_fakeInstagram/login');
  //           break;
  //       }
  //   }

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
    //  
}
?>