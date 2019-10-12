<?php

$erros = [];

function validaNome($nome){
    global $erros;
    if(strlen($nome) == 0){
        array_push($erros, "Preencha o nome corretamente");
    }
}

function validaDescricao($descricao){
    global $erros;
    if(strlen($descricao) < 100){
        array_push($erros, "Coloque uma descrição de al menos 100 caracteres");
    } 
}

function validaPreco($preco){
    global $erros;
    if(strlen($preco) == 0) {
        array_push($erros, "Ensira um preço do produto");
    } 
}

?>