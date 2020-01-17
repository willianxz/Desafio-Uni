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

function limparcadastrocliente(){
	 //Limpa os inputs
     $('input[name="cadastrarnome"]').val("").focus();
     $('input[name="cadastrarcpf"]').val("");
     $('input[name="cadastraremail"]').val("");
}

function listarclientes(){
	 //Lista automaticamente os clientes já cadastrados
	 $.post("listarclientes.php", function(data){
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

function excluircliente(idcliente, nomecliente){

	  var r = confirm("Deseja realmente excluir esse cliente: "+nomecliente+"?");
	  if (r == true) {
		//Aqui eu mostro que também é possivel fazer através de GET.
		$.get("excluircliente.php?idcliente="+idcliente, function(data){		
	         $('#menssagens').html(data).slideDown("slow");
	         listarclientes();
	     });

	      setTimeout(function(){
	        $("#menssagens").html('');
	      },3000);
	  } 
}
