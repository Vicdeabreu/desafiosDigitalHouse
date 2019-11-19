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
      $query = $db->query('SELECT * FROM posts ORDER BY id DESC'); 
      $resultado = $query->fetchAll(PDO::FETCH_OBJ);
      return $resultado;
    }

  }

?>