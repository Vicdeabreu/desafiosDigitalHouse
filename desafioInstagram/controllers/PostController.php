<?php 

  session_start();
  include_once "models/Post.php";

  class PostController{
    public function acao($rotas){
      switch($rotas){ 
        case "posts":
          $this->listarPosts();
        break;
        case "formulario-post":
          $this->viewFormularioPost();
        break;
        case "cadastrar-post":
          $this->cadastroPost();
        break;
        case "like":
          $this->likePost();
        break;
    }
  }

  private function viewFormularioPost(){
    include "views/newPost.php";
  }

  private function viewPost(){
    include "views/posts.php";
  }

  private function listarPosts(){
    $post = new Post();
    $listarPosts = $post->listarPosts();
    $_REQUEST['posts'] = $listarPosts;
    $this->viewPost(); // llama a view
  }

  private function cadastroPost(){
    $id= $_SESSION['id'];
    $descricao = $_POST['descricao'];
    $nomeArquivo = $_FILES['img']['name'];
    $linkTemp = $_FILES['img']['tmp_name'];
    $caminhoSalvar = "views/img/$nomeArquivo";
    $likes = 0;
    move_uploaded_file($linkTemp, $caminhoSalvar);
    $post = new Post();
    $resultado = $post->cadastrarPost($id,$caminhoSalvar,$descricao,$likes);
    if ($resultado){
      header('Location:/desafios/desafioInstagram/posts');
    }else{
      echo "Não foi possível salvar o seu post";
    }
  }

  private function likePost(){
    

  }

  }

?>