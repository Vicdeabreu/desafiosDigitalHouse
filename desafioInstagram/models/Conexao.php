<?php

  class Conexao {

    private $host = 'mysql:host=localhost;dbname=fakegram;port=3306';
    private $user = 'root';
    private $pass = '';

    public function criarConexao(){
      return new PDO($this->host,$this->user,$this->pass);
    }

  }

?>