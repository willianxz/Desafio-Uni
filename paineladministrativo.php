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
  <h3 style="text-align: center;">Painel Administrativo</h3>  
</div>

<div class="card-group">
  <div class="card">
    <a href="cadastroclientes.php" style="text-decoration: none;">
    <img src="img/cliente1.jpg" class="card-img-top" alt="Cadastro de clientes">
    <div class="card-body">
      <h5 class="card-title">Cadastro de Cliente</h5>
      <p class="card-text">Neste módulo você pode consultar,cadastrar, atualizar e excluir seus clientes.</p>
    </div>
    </a>
  </div>
  <div class="card">
    <a href="cadastroprodutos.php" style="text-decoration: none;">
     <img src="img/produto1.jpg" style="width: 350px; height: 300px;padding-left: 20px;" class="card-img-top" alt="Cadastro de produtos">
     <div class="card-body">
       <h5 class="card-title">Cadastro de Produto</h5>
       <p class="card-text">Neste módulo você pode consultar,cadastrar, atualizar e excluir seus produtos.</p>
     </div>
    </a>
  </div>
  <div class="card">
  <a href="cadastropedidos.php" style="text-decoration: none;">
    <img src="img/pedido1.jpg" class="card-img-top" alt="Cadastro de pedidos">
    <div class="card-body">
      <h5 class="card-title">Cadastro de Pedido</h5>
      <p class="card-text">Neste módulo você pode consultar,cadastrar, atualizar e excluir seus pedidos.</p>
    </div>
    </a>
  </div>
</div>



<div class="col-md-4"></div>
  <div id="containerprodutos" class="container-fluid col-md-4" style="text-align: center;display: none;"></div>
<div class="col-md-4"></div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
