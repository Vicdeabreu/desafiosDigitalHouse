<?php 

  session_start();
  include_once "models/Post.php";
  //Incluindo o Model do Post para poder trazer os dados do banco. Tem que iniciar sessão no Login para poder visualizar os posts

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
    //Rotas para visualizar posts, visualizar o formulario do posts, executar o formulario e dar like. Em esse ordem
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
    $_REQUEST['posts'] = $listarPosts; // Pega tudos os posts que tiver tanto no Get como no Post.
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
    //Função para cadastrar o post. Id é igual a o ID de quem iniciou a sessão. O resto dos parámetros são enviados pelo usuário no formulário. Precisa passar a img desde a pasta temporária
  }

  private function likePost(){
    
    // Não conseguí fazer o sistema de Likes. Mas gostaría :(

  }

  }

?>