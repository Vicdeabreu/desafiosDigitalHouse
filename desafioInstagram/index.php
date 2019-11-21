<?php
  
  $rotas = key($_GET)?key($_GET):"posts";

  switch($rotas){
    case "login":
      include "controllers/LoginController.php";
    break;
    case "cadastrar-usuario":
      include "controllers/UsuarioController.php";
      $controller = new UsuarioController();
      $controller->acao($rotas);
    break;
    case "formulario":
      include "controllers/UsuarioController.php";
      $controller = new UsuarioController();
      $controller->acao($rotas);
    break;
    case "posts":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;
    case "formulario-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;
    case "cadastrar-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

  }


?>