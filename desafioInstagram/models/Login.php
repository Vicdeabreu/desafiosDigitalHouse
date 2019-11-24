<?php 
  include_once "Conexao.php";

  class Login extends Conexao{
    public function loginUsuario(){
      parent::criarConexao();
      $query = $db->prepare("SELECT * FROM usuarios WHERE 'nomeusuario' == '$usuario' AND 'senha' == '$senha'");
      $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    }
  }
  

?>