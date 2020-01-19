<?php
	
	$idproduto = $_GET['idproduto'];
	$nomeproduto = $_GET['nomeproduto'];
	$valorunitario = $_GET['valorunitario'];
	$quantidade = $_GET['quantidade'];
	$codbarra = $_GET['codbarra'];
  
	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "UPDATE produto SET nomeproduto = '".$nomeproduto."', valorunitario = '".$valorunitario."', quantidade = '".$quantidade."', codbarra = '".$codbarra."' WHERE idproduto = ".$idproduto; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
 	if($result){
 		 echo "<div class='alert alert-primary' role='alert'>";
 		 echo   "<h3>Produto editado com sucesso.</h3>";
 		 echo "</div>";
 	}
  

?>