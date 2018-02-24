<?php 

//verificador de sessão

require 'verifica.php';
require 'conn.php';

//verifica se o usuario tem permissão de criar personagem
if ($_SESSION['pcAdulto']>0) {
	echo "Você tem permissão para criar um personagem adulto";
}
else{
	echo "Você <b>não tem permissão<b> para criar um personagem adulto";
	exit;
}
if ($_SESSION['pcCrianca']>0) {
	echo "Você tem permissão para criar um personagem criança ou adolescente até 13 anos";
	
}
else{
	echo "Você <b>não tem permissão<b> para criar um personagem criança ou adolescente";
exit;
}
?>