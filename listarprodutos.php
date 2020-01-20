<?php
    
      session_start();

      //Verifica se realmente o usuario pode estar aqui.
      $logado = isset($_SESSION['logado']) && ($_SESSION['logado']);
      if(!$logado){
        header("location: index.html");
      }


     if(!isset($_SESSION['limitevisualizacaoprodutos'])){
        $_SESSION['limitevisualizacaoprodutos'] = 5;
     }

    if(isset($_POST['limitevisualizacaoprodutos']) && !empty($_POST['limitevisualizacaoprodutos'])){
        $_SESSION['limitevisualizacaoprodutos'] += $_POST['limitevisualizacaoprodutos'];
    }

    $limitevisualizacaoprodutos = $_SESSION['limitevisualizacaoprodutos'];

	//Incluimos a nossa conexão com o banco.
    $conectar = include('config/conectdb.php'); 

    //Fazemos a nossa query.
	$query = "SELECT * FROM produto order by nomeproduto limit ".$limitevisualizacaoprodutos; 
        
    //Executamos nossa query
    $result = mysqli_query($conectar, $query);     

    echo "</br>";
  	echo "<h3>Lista de produtos</h3>";
    //Percorremos a nossa tabela
     while($dados =  mysqli_fetch_array($result)){
     	   $btneditar = '<button style="margin-right: 20px;" class="btn btn-primary" onclick="editarproduto(\''.$dados['idproduto']. '\',\''.$dados['nomeproduto'].'\')")">Editar</button>';
     	   $btnexcluir = '<button class="btn btn-danger" onclick="excluirproduto(\''.$dados['idproduto']. '\',\''.$dados['nomeproduto'].'\')">Excluir</button>';

     	  
            echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Nome do Produto:</span>";
     		echo    "</div>";
     		echo    "<input type='text' name='nomeproduto".$dados['idproduto']."' value='".$dados['nomeproduto']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

     		echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Valor Unitario:</span>";
     		echo    "</div>";
     		echo    "<input type='number' name='valorunitario".$dados['idproduto']."' value='".$dados['valorunitario']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

            echo  "<div class='input-group mb-3'>";
            echo    "<div class='input-group-prepend'>";
            echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Quantidade:</span>";
            echo    "</div>";
            echo    "<input type='number' name='quantidade".$dados['idproduto']."' value='".$dados['quantidade']."' class='form-control' aria-label='Sizing example input'". 
             "aria-describedby='inputGroup-sizing-default' required>";
            echo "</div>";

     		echo  "<div class='input-group mb-3'>";
    	    echo    "<div class='input-group-prepend'>";
     		echo      "<span class='input-group-text' id='inputGroup-sizing-default'>Código de Barra:</span>";
     		echo    "</div>";
     		echo    "<input type='text' name='codbarra".$dados['idproduto']."' value='".$dados['codbarra']."' class='form-control' aria-label='Sizing example input'". 
     		 "aria-describedby='inputGroup-sizing-default' required>";
     		echo "</div>";

            echo "<p>".
           		$btneditar.
           		$btnexcluir.
           		"</p>";          
     } 





?>

	  
 	