<?php

	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "SELECT * FROM cliente order by nomecliente"; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     

    $test = "Daniel";

  	echo "<h3>Lista de clientes</h3>";
    //Percorremos a nossa tabela
     while($dados =  mysqli_fetch_array($result)){
     	   $btneditar = '<button onclick="editarcliente(\''.$dados['idcliente']. '\',\''.$dados['nomecliente'].'\')")">Editar</button>';
     	   $btnexcluir = '<button onclick="excluircliente(\''.$dados['idcliente']. '\',\''.$dados['nomecliente'].'\')">Excluir</button>';

     	   echo "<hr/>";
           echo "<p> Nome: <input type='text' name='nome".$dados['idcliente']."' value='".$dados['nomecliente']."' /></p>";
           echo "<p> Cpf: <input type='text' name='cpf".$dados['idcliente']."' value='".$dados['cpf']."' /></p>"; 
           echo "<p> Email: <input type='text' name='email".$dados['idcliente']."' value='".$dados['email']."' /></p>";
           echo "<p>".
           		$btneditar.
           		$btnexcluir.
           		"</p>";          
     } 
?>


