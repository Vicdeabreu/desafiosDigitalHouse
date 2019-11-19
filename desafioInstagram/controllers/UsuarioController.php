<?php 

  include_once "models/Usuario.php";

  class UsuarioController{
    public function acao($rotas){
      switch($rotas){
        case "cadastrar-usuario":
          $this->cadastroUsuario();
        break;
        case "formulario":
          $this->viewFormulario();
        break;
      }
    }

    private function cadastroUsuario(){
      $nome = $_POST['nome'];
      $nomeUsuario = $_POST['username'];
      $nomeArquivo = $_FILES['img']['name'];
      $linkTemp = $_FILES['img']['tmp_name'];
      $caminhoSalvar = "/img/$nomeArquivo";
      move_uploaded_file($linkTemp, $caminhoSalvar);
      $senha = $_POST['senha'];

      $usuario = new Usuario();
      $resultado = $usuario->cadastrarUsuario($nome,$nomeUsuario,$caminhoSalvar,$senha);
      if($resultado){
        header('Location:/desafioInstagram/posts');
      }else{
        echo "Não foi possível cadastrar o usuario";
      }
    }

    private function viewFormulario(){
      include "views/newUsuario.php";
    }



  }

?>