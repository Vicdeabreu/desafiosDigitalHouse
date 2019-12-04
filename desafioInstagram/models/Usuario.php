<?php 

  include_once "Conexao.php";

  class Usuario extends Conexao{

    public function cadastrarUsuario($nome,$username,$imagem,$senha){
      $db = parent::criarConexao();
      $query = $db->prepare("INSERT INTO usuarios (nome,nomeUsuario,img,senha) values (?,?,?,?)");
      return $query->execute([$nome,$username,$imagem,$senha]);
    } // Prepara a query com os dados a enserir dentro do banco de dados
  }


?>