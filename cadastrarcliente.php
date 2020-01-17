<?php
header('Content-type: text/html; charset=UTF-8');
			
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$email = $_POST['email'];	

			// Cria uma nova conexão com o banco.
			$conectado = include("config/conectdb.php");				
				
			if($conectado){			

				// Verifica a conexão com o banco.
				if (!$conectado) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
				//Faz a inserção no banco.
				$sql = "INSERT INTO cliente (nomecliente, cpf, email)"."VALUES ('".$nome."', '".$cpf."', '".$email."')";

				$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
				
				mysqli_close($conectado);
				
				if($result){
					echo "<h1>Novo cliente: <u>".$nome."</u> cadastrado com sucesso!</h1>";
				}				
		  }

?>