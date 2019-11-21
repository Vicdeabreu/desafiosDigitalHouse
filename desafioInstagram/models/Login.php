<?php 
  include_once "Conexao.php";

  class Login extends Conexao{
    public function loginUsuario(){
      parent::criarConexao();
      $query = $db->prepare("SELECT usuarios (null,nomeUsuario,null,senha) values(?,?,?,?)");
      return $query->execute([]);
    }
  }

?>