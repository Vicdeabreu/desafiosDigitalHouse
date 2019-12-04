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
      //Criando o formulário para logar o usuário. Prepara a query apenas com o parámetro onde ele vai se logar, nesse caso o nomeUsuario ou username. Em caso de coincidir com o banco de dados, traz para a gente em formato de array associativo. Si tiver algúm, foi porque achou um usuário. Si retornar false, é porque não tem nenhum usuário
    }

  }
  

?>