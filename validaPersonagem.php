<?php 
//inclue o arquivo de bd
require "conn.php";
require"verifica.php";
//inicia a sessão
session_start();





		//passa os dados e redireciona o usuário
		$_SESSION["id_personagem"] = $_POST['idPersonagem'];
		$_SESSION["personagem"] = $_POST['nomePersonagem'];
		$_SESSION["idEscola"] =$_POST['idEscola'];
		$_SESSION["escola"] = $_POST['nomeEscola'];
		$_SESSION["idade"] = $_POST['idade'];
		$_SESSION["MP"] = $_POST['MP'];
		$_SESSION["graduacao"] = $_POST['graduacao'];
		$_SESSION["HP"] = $_POST['HP'];
		$_SESSION["sangue"] = $_POST['sangue'];
		$_SESSION["pai"] = $_POST['pai'];
		$_SESSION["mae"] = $_POST['mae'];
		$_SESSION["ultimoPost"] = $_POST['dtultimopost'];
		$_SESSION["galeoes"] = $_POST['galeoes'];
		$_SESSION["sicles"] = $_POST['sicles'];
		$_SESSION["nuques"] = $_POST['nuques'];
		header("Location: homepersonagem.php");
		
	

?>
