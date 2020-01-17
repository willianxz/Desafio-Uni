<?php

	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "SELECT * FROM cliente order by nomecliente"; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     
  
  	echo "<h3>Lista de clientes</h3>";
    //Percorremos a nossa tabela de notebooks
     while($dados =  mysqli_fetch_array($result)){
     	   echo "<hr/>";
           echo "<p> Nome: ".$dados['nomecliente']."</p>";
           echo "<p> Cpf: ".$dados['cpf']."</p>"; 
           echo "<p> Email: ".$dados['email']."</p>";
       } 
?>