<?php 

session_start();

//verifica se existe dados na sessão de login

if (!isset($_SESSION["id_usuario"]) || !isset($_SESSION["usuario"])) {
	//usuário não logado redireciona para a página de login
	header("Location: login.html");
	exit;
}

?>