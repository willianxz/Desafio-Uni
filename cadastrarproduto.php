<?php
header('Content-type: text/html; charset=UTF-8');
			
			$nomeproduto = $_POST['nomeproduto'];
			$valorunitario = $_POST['valorunitario'];
			$quantidade = $_POST['quantidade'];	
			$codbarra = $_POST['codbarra'];	

			// Cria uma nova conexão com o banco.
			$conectado = include("config/conectdb.php");				
				
			if($conectado){			

				// Verifica a conexão com o banco.
				if (!$conectado) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
				//Faz a inserção no banco.
				$sql = "INSERT INTO produto (nomeproduto, valorunitario, quantidade, codbarra)"."VALUES ('".$nomeproduto."', '".$valorunitario."', '".$quantidade."', '".$codbarra."')";

				$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
				
				mysqli_close($conectado);
				
				if($result){
					echo "<div class='alert alert-primary' role='alert'>";
					echo "<h3>Novo produto: <u>".$nomeproduto."</u> cadastrado com sucesso!</h3>";
					echo "</div>";
				}				
		  }

?>