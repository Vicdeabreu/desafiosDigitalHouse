<?php

  include_once "Conexao.php";

  class Post extends Conexao{
    public function cadastrarPost($userID,$img,$descricao,$likes){
      $db = parent::criarConexao();
      $query = $db->prepare("INSERT INTO posts(usuarios_id,img,descricao,likes) VALUES (?,?,?,?)");
      return $query->execute([$userID,$img,$descricao,$likes]);
    }

    public function listarPosts(){
      $db = parent::criarConexao();
      $query = $db->query('SELECT posts.id, usuarios.nomeUsuario, usuarios.img as uimg, usuarios.nome, posts.img, posts.descricao, posts.likes FROM posts INNER JOIN usuarios ON posts.usuarios_id=usuarios.id ORDER BY id DESC');
      $resultado = $query->fetchAll(PDO::FETCH_OBJ);
      return $resultado;
    }

    public function likePost(){
      $db = parent::criarConexao();
      $query = $db->prepare("INSERT INTO posts()");
      return $query->execute([$like]);
    }

  }

?>