<?php 
  include_once "Conexao.php";

  class Login extends Conexao{
    public function loginUsuario($nomeUsuario){
      $db=parent::criarConexao();
      $query = $db->prepare("SELECT * FROM usuarios WHERE nomeUsuario = ?");
      $query->execute([$nomeUsuario]);
      $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
      if(count($resultado) > 0){
        return $resultado[0];
      }else{
        return false;
      }
    }

  }
  

?>