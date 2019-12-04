<?php
  
  $rotas = key($_GET)?key($_GET):"login";
  // criando a rota inicial de entrada no site

  switch($rotas){
    case "login":
      include "controllers/LoginController.php";
      $controller = new LoginController();
      $controller->acao($rotas);
      // Criando rota para visualizar o formulario de login
    break;
    case "logar":
      include "controllers/LoginController.php";
      $controller = new LoginController();
      $controller->acao($rotas);
    break;
    case "cadastrar-usuario":
      include "controllers/UsuarioController.php";
      $controller = new UsuarioController();
      $controller->acao($rotas);
      //Criando a rota para cadastrar o usuário
    break;
    case "formulario":
      include "controllers/UsuarioController.php";
      $controller = new UsuarioController();
      $controller->acao($rotas);
      //Criando a rota para visualizar o formulario de visualizar o formulario de cadastro do usuário
    break;
    case "posts":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
      //Criando a rota para visualizar os posts
    break;
    case "formulario-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
      //Criando a rota para visualizar o formulario de cadastrar posts
    break;
    case "cadastrar-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
      //Criando a rota para executar o formulario de posts e cadastrar no banco de dados
    break;
    case "like":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
      //Rota para dar like em cada post
    break;
    case "logout":
      include "controllers/LogoutController.php";
      $controller = new LogoutController();
      $controller->acao($rotas);
      // Rota para mandar para o logout que destroi a sessão e manda depois para o login
    break; 
  }


?>