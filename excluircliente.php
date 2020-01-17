<?php
	
	$idcliente = $_GET['idcliente'];
  
	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "DELETE FROM cliente WHERE idcliente=".$idcliente; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
 	if($result){
 		echo "<h3>Cliente excluido com sucesso.</h3>";
 	}
  

?>