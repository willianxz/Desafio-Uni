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
   //Lista os pedidos existentes
   //listarpedidos();

   //Exibe/oculta o mini painel de cadastro de novos pedidos
   togglepainelcadastro();

   //Solicita o cadastro de um novo pedido caso o formulário do painel seja submetido
   cadastrarpedido(); 

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
  <h3 style="text-align: center;">Cadastro de Pedido</h3>  
</div>

<div id="menssagens" class="col-md-12" style="text-align: center;"></div>
<div class="col-md-4"></div>
<div class="container-fluid col-md-4">
<div id="containercadastro">
  <form id="cadastro">
     
       <div class="form-group" style="text-align: center;">
        <label for="exampleFormControlSelect1" >Cliente</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>João</option>
          <option>Maria</option>
          <option>Fernando</option>
          <option>Joseval</option>
          <option>Daniel</option>
        </select>
      </div>


     
    <p style="text-align: center;">Produto</p>

     <div id="produtoscadastro"> 
        <div class="form-row">
          <div class="col">
             <div class="form-group" style="text-align: center;">
              <select class="form-control">
                <option selected>Nenhum</option>
                <option>Laranja</option>
                <option>Melancia</option>
                <option>Batata</option>
                <option>Couve Flor</option>
              </select>
            </div>
          </div>
          <div class="col">
            <input type="number" class="form-control" value="0" placeholder="Quantidade">
          </div>
        </div>
      </div>

       <button type="button" onclick="adicionarmaisproduto();" style="margin-left: 40%;" class="btn btn-info mb-2">Adicionar +</button>
       </br>
      <button id="cadastrarpedido" class="btn btn-primary">Cadastrar Pedido</button>
  </form>

  </br>
 </div> 
   <button id="exibircontainercadastro" style="margin-left: 22%;">Mostrar Painel de Cadastro</button>
</div>
<div class="col-md-4"></div>


<div class="col-md-4"></div>
  <div id="containerpedidos" class="container-fluid col-md-4" style="text-align: center;padding-bottom: 20px;">
    <!-- Estou simulando como o Back-End traria as informações. -->
      </br>
      <h3>Lista de pedidos</h3>

      <div id="pedido1" style="padding: 20px;border-style: double; border-width: 4px;">

          <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Numero do Pedido:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="2240029" disabled>
           </div>


           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="inputGroup-sizing-default">Data do Pedido:</span>
             </div>
             <input type="text" value="19/01/2020" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
          </div>

           <div class="form-group" style="text-align: center;">
              <label for="exampleFormControlSelect1" >Status do Pedido</label>
              <select class="form-control">
                <option selected>Em aberto</option>
                <option>Pago</option>
                <option>Cancelado</option>
              </select>
           </div>


          <div class="form-group" style="text-align: center;">
            <label for="exampleFormControlSelect1" >Cliente</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option selected>João</option>
              <option>Maria</option>
              <option>Fernando</option>
              <option>Joseval</option>
              <option>Daniel</option>
            </select>
          </div>

         
        <p style="text-align: center;">Produto</p>

           <div> 
            <div class="form-row">
              <div class="col">
                 <div class="form-group" style="text-align: center;">
                  <select class="form-control">
                    <option>Nenhum</option>
                    <option selected>Laranja</option>
                    <option>Melancia</option>
                    <option>Batata</option>
                    <option>Couve Flor</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <input type="number" class="form-control" value="5" placeholder="Quantidade">
              </div>
            </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.95" disabled>
              </div>

             <div class="form-row">
              <div class="col">
                 <div class="form-group" style="text-align: center;">
                  <select class="form-control">
                    <option>Nenhum</option>
                    <option>Laranja</option>
                    <option selected>Melancia</option>
                    <option>Batata</option>
                    <option>Couve Flor</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <input type="number" class="form-control" value="1" placeholder="Quantidade">
              </div>
            </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="15.40" disabled>
              </div>

              </br>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><b>Total do Pedido:</b></span>
                </div>
                <input type="text" value="20,15" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
             </div>

            <button type="button" onclick="editarpedido();" style="margin-right: 20px;" class="btn btn-primary">Editar</button>
            <button type="button" onclick="excluirpedido();" class="btn btn-danger">Excluir</button>
         </div>
     </div> 

     </br>

     <div id="pedido2" style="padding: 20px;border-style: double; border-width: 4px;">

          <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Numero do Pedido:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="2240029" disabled>
           </div>


           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="inputGroup-sizing-default">Data do Pedido:</span>
             </div>
             <input type="text" value="16/01/2020" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
          </div>

           <div class="form-group" style="text-align: center;">
              <label for="exampleFormControlSelect1" >Status do Pedido</label>
              <select class="form-control">
                <option>Em aberto</option>
                <option selected>Pago</option>
                <option>Cancelado</option>
              </select>
           </div>


          <div class="form-group" style="text-align: center;">
            <label for="exampleFormControlSelect1" >Cliente</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>João</option>
              <option selected>Maria</option>
              <option>Fernando</option>
              <option>Joseval</option>
              <option>Daniel</option>
            </select>
          </div>

         
        <p style="text-align: center;">Produto</p>

           <div> 
            <div class="form-row">
              <div class="col">
                 <div class="form-group" style="text-align: center;">
                  <select class="form-control">
                    <option>Nenhum</option>
                    <option>Laranja</option>
                    <option>Melancia</option>
                    <option selected>Batata</option>
                    <option>Couve Flor</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <input type="number" class="form-control" value="20" placeholder="Quantidade">
              </div>
            </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.25" disabled>
              </div>




             <div class="form-row">
              <div class="col">
                 <div class="form-group" style="text-align: center;">
                  <select class="form-control">
                    <option>Nenhum</option>
                    <option>Laranja</option>
                    <option>Melancia</option>
                    <option>Batata</option>
                    <option selected>Couve Flor</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <input type="number" class="form-control" value="5" placeholder="Quantidade">
              </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.70" disabled>
              </div>


            <div class="form-row">
              <div class="col">
                 <div class="form-group" style="text-align: center;">
                  <select class="form-control">
                    <option>Nenhum</option>
                    <option selected>Laranja</option>
                    <option>Melancia</option>
                    <option>Batata</option>
                    <option>Couve Flor</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <input type="number" class="form-control" value="8" placeholder="Quantidade">
              </div>
            </div>

             <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Valor Unitário:</span>
                </div>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.95" disabled>
              </div>

              </br>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><b>Total do Pedido:</b></span>
                </div>
                <input type="text" value="16.10" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
             </div>

            <button type="button" onclick="editarpedido();" style="margin-right: 20px;" class="btn btn-primary">Editar</button>
            <button type="button" onclick="excluirpedido();" class="btn btn-danger">Excluir</button>
         </div>
     </div> 




  </div>
<div class="col-md-4"></div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
