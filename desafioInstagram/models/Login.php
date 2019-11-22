<?php 
  include_once "Conexao.php";

  class Login extends Conexao{
    public function loginUsuario(){
      parent::criarConexao();
      $query = $db->prepare("SELECT * FROM usuarios WHERE $nomeUsuario == 'nomeusuario' && $senha == 'senha'");
      return $query->execute([]);
    }
  }

?>