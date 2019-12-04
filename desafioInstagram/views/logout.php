<?php 
  session_start(); 
  session_destroy();
  header('Location:login');

  // So abre a sessão para destruir-la e manda para o login

?>