<?php
	
	$idcliente = $_GET['idcliente'];
	$nomecliente = $_GET['nomecliente'];
	$cpf = $_GET['cpf'];
	$email = $_GET['email'];
  
	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "UPDATE cliente SET nomecliente = '".$nomecliente."', cpf = '".$cpf."', email = '".$email."' WHERE idcliente = ".$idcliente; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
 	if($result){
 		 echo "<div class='alert alert-primary' role='alert'>";
 		 echo   "<h3>Cliente editado com sucesso.</h3>";
 		 echo "</div>";
 	}
  

?>