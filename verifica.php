<?php 

session_start();

//verifica se existe dados na sessão de login

if (!isset($_SESSION["logado"]))  {
	//usuário não logado redireciona para a página de login
	header("Location: index.html");
	exit;
}

?>