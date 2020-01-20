
//Geral
function togglepainelcadastro(){
  $('#exibircontainercadastro').click(function(){
      $('#containercadastro').toggle();
      var textocontainercadastro = $('#exibircontainercadastro').text();
      if(textocontainercadastro === "Mostrar Painel de Cadastro"){
      	$('#exibircontainercadastro').text("Ocultar Painel de Cadastro");
      }else{
      	$('#exibircontainercadastro').text("Mostrar Painel de Cadastro");
      }
  });
}


//Cliente

function limparcadastrocliente(){
	 //Limpa os inputs
     $('input[name="cadastrarnome"]').val("").focus();
     $('input[name="cadastrarcpf"]').val("");
     $('input[name="cadastraremail"]').val("");
}

function listarclientes(limitevisualizacaoclientes = 0){
	 //Lista automaticamente os clientes já cadastrados
	 $.post("listarclientes.php", {limitevisualizacaoclientes: limitevisualizacaoclientes}, function(data){
	     $('#containerclientes').html(data).slideDown("slow");
	 });
}

function cadastrarcliente(){
	//Solicita um novo cadastro de cliente.
  $("#cadastro").submit(function(evet){
    event.preventDefault();

    var nome = $('input[name="cadastrarnome"]').val();
    var cpf = $('input[name="cadastrarcpf"]').val();
    var email = $('input[name="cadastraremail"]').val();

    $.post("cadastrarcliente.php",
    {
      nome: nome,
      cpf: cpf,
      email: email
    },
    function(data,status){
       //Seta a resposta vinda do Back-End
       $("#menssagens").html(data);

      
       //Atualiza a lista de clientes solicitando pro Back-End.
        //Lista automaticamente os clientes já cadastrados
        listarclientes();

       limparcadastrocliente();
       

      setTimeout(function(){
        $("#menssagens").html('');
      },3000);
    });
  });
}

function editarcliente(idcliente, nomecliente){ 

  var r = confirm("Deseja realmente editar esse cliente: "+nomecliente+"?");
    if (r == true) {

    var nomecliente = $("input[name='nome"+idcliente+"']").val();
    var cpf = $("input[name='cpf"+idcliente+"']").val();
    var email = $("input[name='email"+idcliente+"']").val();

    var url = "editarcliente.php?idcliente="+idcliente+"&nomecliente="+nomecliente+"&cpf="+cpf+"&email="+email;
       $.get(url, function(data){    
           $('#menssagens').html(data).slideDown("slow");
           listarclientes();
       });

        setTimeout(function(){
          $("#menssagens").html('');
        },3000);
    } 
}

function excluircliente(idcliente, nomecliente){

	  var r = confirm("Deseja realmente excluir esse cliente: "+nomecliente+"?");
	  if (r == true) {
    var url ="excluircliente.php?idcliente="+idcliente+"&nomecliente="+nomecliente;
		//Aqui eu mostro que também é possivel fazer através de GET.
		$.get(url, function(data){		
	         $('#menssagens').html(data).slideDown("slow");
	         listarclientes();
	     });

	      setTimeout(function(){
	        $("#menssagens").html('');
	      },3000);
	  } 
}



//Produto

function limparcadastroproduto(){
    //Limpa os inputs
     $('input[name="cadastrarnomeproduto"]').val("").focus();
     $('input[name="cadastrarvalorunitario"]').val("");
     $('input[name="cadastrarquantidade"]').val("");
     $('input[name="cadastrarcodbarra"]').val("");
}


function listarprodutos(limitevisualizacaoprodutos = 0){
   //Lista automaticamente os produtos já cadastrados
   $.post("listarprodutos.php", {limitevisualizacaoprodutos: limitevisualizacaoprodutos}, function(data){
       $('#containerprodutos').html(data).slideDown("slow");
   });
}


function cadastrarproduto(){
  //Solicita um novo cadastro de produto.
  $("#cadastro").submit(function(evet){
    event.preventDefault();

    var nomeproduto = $('input[name="cadastrarnomeproduto"]').val();
    var valorunitario = $('input[name="cadastrarvalorunitario"]').val();
    var quantidade = $('input[name="cadastrarquantidade"]').val();
    var codbarra = $('input[name="cadastrarcodbarra"]').val();
    codbarra = codbarra.toUpperCase();

    $.post("cadastrarproduto.php",
    {
      nomeproduto: nomeproduto,
      valorunitario: valorunitario,
      quantidade: quantidade,
      codbarra: codbarra
    },
    function(data,status){
       //Seta a resposta vinda do Back-End
       $("#menssagens").html(data);

      
       //Atualiza a lista de produtos solicitando pro Back-End.
        //Lista automaticamente os produtos já cadastrados
        listarprodutos();

        limparcadastroproduto();       

      setTimeout(function(){
        $("#menssagens").html('');
      },3000);
    });
  });
}


function editarproduto(idproduto, nomeproduto){ 

  var r = confirm("Deseja realmente editar esse produto: "+nomeproduto+"?");
    if (r == true) {

    var nomeproduto = $("input[name='nomeproduto"+idproduto+"']").val();
    var valorunitario = $("input[name='valorunitario"+idproduto+"']").val();
    var quantidade = $("input[name='quantidade"+idproduto+"']").val();
    var codbarra = $("input[name='codbarra"+idproduto+"']").val();
    codbarra = codbarra.toUpperCase();

    var url = "editarproduto.php?idproduto="+idproduto+"&nomeproduto="+nomeproduto+"&valorunitario="+valorunitario+"&quantidade="+quantidade+"&codbarra="+codbarra;
       $.get(url, function(data){    
           $('#menssagens').html(data).slideDown("slow");
           listarprodutos();
       });

        setTimeout(function(){
          $("#menssagens").html('');
        },3000);
    } 
}

function excluirproduto(idproduto, nomeproduto){

    var r = confirm("Deseja realmente excluir esse produto: "+nomeproduto+"?");
    if (r == true) {
    var url ="excluirproduto.php?idproduto="+idproduto+"&nomeproduto="+nomeproduto;
    //Aqui eu mostro que também é possivel fazer através de GET.
    $.get(url, function(data){    
           $('#menssagens').html(data).slideDown("slow");
           listarprodutos();
       });

        setTimeout(function(){
          $("#menssagens").html('');
        },3000);
    } 
}



//PEDIDO


function adicionarmaisproduto(){
  var novoprodutohtml = "<div class='form-row'>"+
                            "<div class='col'>"+
                                "<div class='form-group' style='text-align: center;'>"+
                                   "<select class='form-control'>"+
                                     "<option selected>Nenhum</option>"+
                                     "<option>Laranja</option>"+
                                     "<option>Melancia</option>"+
                                     "<option>Batata</option>"+
                                     "<option>Couve Flor</option>"+
                                     "</select>"+
                                 "</div>"+
                             "</div>"+
                          "<div class='col'>"+
                            "<input type='number' class='form-control' value='0' placeholder='Quantidade'>"+
                          "</div>"+
                       "</div>";

  $("#produtoscadastro").append(novoprodutohtml);
}



function cadastrarpedido(){
  //Solicita um novo cadastro de pedido.
  $("#cadastro").submit(function(evet){
    alert('Desculpe, essa função no momento não foi desenvolvida.');
    event.preventDefault();
      //Soliite o back-end para cadastrar o pedido.
  });
}


function editarpedido(){ 
  alert('Desculpe, essa função no momento não foi desenvolvida.');  
}

function excluirpedido(){
    alert('Desculpe, essa função no momento não foi desenvolvida.');  
}
