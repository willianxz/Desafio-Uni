<?php
	
	$idcliente = $_GET['idcliente'];
	$nomecliente = $_GET['nomecliente'];
  
	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "DELETE FROM cliente WHERE idcliente=".$idcliente; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
 	if($result){
 		echo "<h1>Cliente <u>".$nomecliente."</u> excluido com sucesso.</h1>";
 	}
  

?>