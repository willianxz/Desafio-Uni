<?php

  session_start();
  $_SESSION['logado'] = false;
  $emailadministrativo = $_POST['emailadministrativo'];
  $senhaadministrativo = $_POST['senhaadministrativo'];
  $senhaadministrativo = md5($senhaadministrativo."umafraseparamantersenhasegura");
  
  $emailadministrativovalido = "emailadministrativouniasselvi@hotmail.com";
  $senhaadministrativovalido = md5("uniasselvi"."umafraseparamantersenhasegura");

  $emailok = $emailadministrativo === $emailadministrativovalido;
  $senhaok = $senhaadministrativo === $senhaadministrativovalido;
  if($emailok && $senhaok){
  	$_SESSION['logado'] = true;
  	header("location: paineladministrativo.php");
  }else{
    header("location: index.html");
  }



?>