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
      // Rotas para visualizar o usuário "formulario" e para executar o formulario de cadastro do usuário "cadastrar-usuario"
    }

    private function cadastroUsuario(){
      $nome = $_POST['nome'];
      $nomeUsuario = $_POST['username'];
      $nomeArquivo = $_FILES['img']['name'];
      $linkTemp = $_FILES['img']['tmp_name'];
      $caminhoSalvar = "/img/$nomeArquivo";
      move_uploaded_file($linkTemp, $caminhoSalvar);
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

      $usuario = new Usuario();
      $resultado = $usuario->cadastrarUsuario($nome,$nomeUsuario,$caminhoSalvar,$senha);
      if($resultado){
        header('Location:login');
      }else{
        echo "Não foi possível cadastrar o usuario";
      }
      //Função para cadastrar um usuário novo. Dados que passa o usuário pelo input, a senha vai encriptada e logo redirecciona em caso de dar certo
    }

    private function viewFormulario(){
      include "views/newUsuario.php";
    }



  }

?>