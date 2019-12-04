<?php

  include_once "Conexao.php";

  class Post extends Conexao{
    public function cadastrarPost($userID,$img,$descricao,$likes){
      $db = parent::criarConexao();
      $query = $db->prepare("INSERT INTO posts(usuarios_id,img,descricao,likes) VALUES (?,?,?,?)");
      return $query->execute([$userID,$img,$descricao,$likes]);
      //Criando a função para cadastrar um post novo. Prepara a query com os dados a enserir e executa para mandar a o controller
    }

    public function listarPosts(){
      $db = parent::criarConexao();
      $query = $db->query('SELECT posts.id, usuarios.nomeUsuario, usuarios.img as uimg, usuarios.nome, posts.img, posts.descricao, posts.likes FROM posts INNER JOIN usuarios ON posts.usuarios_id=usuarios.id ORDER BY id DESC');
      $resultado = $query->fetchAll(PDO::FETCH_OBJ);
      return $resultado;
      //Criando a função para visualizar os posts enquanto o usuario tiver logado. Executa a query com os dados que quer seleccionar do banco e faz um inner join na tabela usuario para trazer tudos os valores do usuario logado
    }

    public function likePost(){
      $db = parent::criarConexao();
      $query = $db->prepare("INSERT INTO posts()");
      return $query->execute([$like]);
      // Criando a função para dar like em cada post
    }

  }

?>