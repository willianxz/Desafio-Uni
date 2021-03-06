<?php
  session_start();
  $logado = isset($_SESSION['logado']) && ($_SESSION['logado']);
  if(!$logado){
    header("location: index.html");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/mestre.css">
<link rel="stylesheet" type="text/css" href="css/animacoes.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="funcoes.js"></script>
<script>
$(document).ready(function(){
   //Lista os produtos existentes 
   listarprodutos();

   //Exibe/oculta o mini painel de cadastro de novos produtos
   togglepainelcadastro();

   //Solicita o cadastro de um novo produto caso o formulário do painel seja submetido
   cadastrarproduto(); 

});
</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="paineladministrativo.php">Painel Administrativo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="cadastroclientes.php">Cadastro Cliente <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="cadastroprodutos.php">Cadastro Produto <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cadastropedidos.php">Cadastro Pedido <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a class="navbar-brand" href="deslogar.php">
    <img src="img/iconesair1.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Sair
  </a>
  </div>
</nav>


<div class="col-md-12 jumbotron" style="background-color:skyblue;">
  <h3 style="text-align: center;">Cadastro de Produto</h3>  
</div>

<div id="menssagens" class="col-md-12" style="text-align: center;"></div>
<div class="col-md-4"></div>
<div class="container-fluid col-md-4">
<div id="containercadastro">
  <form id="cadastro">
     
     <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Nome do Produto:</span>
        </div>
        <input type="text" name="cadastrarnomeproduto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
      </div>


      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
        </div>
        <input type="text" name="cadastrarvalorunitario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
      </div>


      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Quantidade:</span>
        </div>
        <input type="number" name="cadastrarquantidade" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Código de Barra:</span>
        </div>
        <input type="text" name="cadastrarcodbarra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
      </div>

      <button id="cadastrarproduto" class="btn btn-primary">Cadastrar Novo Produto</button>
  </form>

  </br>
 </div> 
   <button id="exibircontainercadastro" style="margin-left: 22%;">Mostrar Painel de Cadastro</button>
</div>
<div class="col-md-4"></div>


<div class="col-md-4"></div>
  <div id="containerprodutos" class="container-fluid col-md-4" style="text-align: center;display: none;"></div>
<div class="col-md-4"></div>

<button type="button" class="btn btn-primary btn-lg btn-block" onclick="listarprodutos(5);">CARREGAR MAIS</button>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
