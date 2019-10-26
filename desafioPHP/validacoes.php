<?php 

$erros = [];

function validaNome($nome){
  global $erros;
  if(strlen($nome) == 0){
    $erros[] = "Preencha o nome corretamente";
  }
}

function validaDescricao($descricao){
  global $erros;
  if(strlen($descricao) == 0){
    $erros[] = "Preencha uma descricao válida";
  }
}

function validaPreco($preco){
  global $erros;
  if(strlen($preco) == 0){
    $erros[] = "Ensira um valor para o seu produto";
  }
}

?>