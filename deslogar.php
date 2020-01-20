<?php	
	session_start();
	$logado = isset($_SESSION['logado']) && ($_SESSION['logado']);
	if($logado){
		session_destroy();
		header("location: index.html");
	}
?>