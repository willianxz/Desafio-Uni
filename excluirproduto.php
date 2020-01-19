<?php
	
	$idproduto = $_GET['idproduto'];
	$nomeproduto = $_GET['nomeproduto'];
  
	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "DELETE FROM produto WHERE idproduto=".$idproduto; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
 	if($result){
 		echo "<div class='alert alert-primary' role='alert'>";
 		echo    "<h3>Produto <u>".$nomeproduto."</u> excluido com sucesso.</h3>";
 		echo "</div>";
 	}
  

?>