<?php
    
    session_start();

     //Verifica se realmente o usuario pode estar aqui.
    $logado = isset($_SESSION['logado']) && ($_SESSION['logado']);
    if(!$logado){
        header("location: index.html");
    }

     if(!isset($_SESSION['limitevisualizacaoclientes'])){
        $_SESSION['limitevisualizacaoclientes'] = 5;
     }

    if(isset($_POST['limitevisualizacaoclientes']) && !empty($_POST['limitevisualizacaoclientes'])){
        $_SESSION['limitevisualizacaoclientes'] += $_POST['limitevisualizacaoclientes'];
    }

    $limitevisualizacaoclientes = $_SESSION['limitevisualizacaoclientes'];  

	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "SELECT * FROM cliente order by nomecliente limit ".$limitevisualizacaoclientes; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     

    echo "</br>";
  	echo "<h3>Lista de clientes</h3>";
    //Percorremos a nossa tabela
     while($dados =  mysqli_fetch_array($result)){
     	   $btneditar = '<button style="margin-right: 20px;" class="btn btn-primary" onclick="editarcliente(\''.$dados['idcliente']. '\',\''.$dados['nomecliente'].'\')")">Editar</button>';
     	   $btnexcluir = '<button class="btn btn-danger" onclick="excluircliente(\''.$dados['idcliente']. '\',\''.$dados['nomecliente'].'\')">Excluir</button>';

     	  
            echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Nome:</span>";
     		echo    "</div>";
     		echo    "<input type='text' name='nome".$dados['idcliente']."' value='".$dados['nomecliente']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

     		echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Cpf:</span>";
     		echo    "</div>";
     		echo    "<input type='text' name='cpf".$dados['idcliente']."' value='".$dados['cpf']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

     		echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Email:</span>";
     		echo    "</div>";
     		echo    "<input type='text' name='email".$dados['idcliente']."' value='".$dados['email']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

            echo "<p>".
           		$btneditar.
           		$btnexcluir.
           		"</p>";          
     } 





?>

	  
 	