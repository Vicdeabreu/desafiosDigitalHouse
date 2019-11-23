<?php 
  include_once "Conexao.php";

  session_start();

  


  // if($usuario == "" || $usuario == null){
  //   echo "Error: O usuario ou a senha não coincidem";
  // } // Validando sim o usuário não é nulo

  class Login extends Conexao{
    public function loginUsuario(){
      parent::criarConexao();
      $query = $db->prepare("SELECT * FROM usuarios WHERE 'nomeusuario' == '$usuario' AND 'senha' == '$senha'");
      return $query->execute([]);
    }
  }
  

  if($_POST){
    $usuario = $_POST['nomeusuario'];
    $senha = md5($_POST['senha']); // Armazenando os dados do POST dentro de uma variável
  if($usuario == mysqli_query($query)){
    if(password_verify($senha, mysqli_query($query))){
      session_start();
      $_SESSION['logado'] = TRUE;
      header("Location:posts");
    } else {
      echo "Usuario ou senha inválidos";
    }
  } echo "Usuario ou senha inválidos";
  }


    // if($resultado = $mysqli->query($query)) {
    //   while($row = $resultado->fetch_array) {

    //     $userok = $row['nomeusuario'];
    //     $passok = $row['senha'];
    //   }
    // }

    // if(isset($usuario) && isset($senha)) {

    //   if($usuario == $userok && $senha == $passok) {

    //     session_start();
    //     $_SESSION['logado'] = TRUE;
    //     header("Location: posts");
    //   }
    //   else {
    //     Header("Location: login");
    //   }
    // }

?>