<?php 

session_start();

//verifica se existe dados na sessão de login

if (!isset($_SESSION["id_personagem"]) || !isset($_SESSION["nomepersonagem"])) {
	//usuário não logado redireciona para a página de login
	header("Location: login.html");
	exit;
}

?>