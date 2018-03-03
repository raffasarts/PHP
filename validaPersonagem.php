<?php 
//inclue o arquivo de bd
require "conn.php";
require"verifica.php";
//inicia a sessão







		//passa os dados e redireciona o usuário
		$_SESSION["id_personagem"] = $_GET['id'];
		$_SESSION["personagem"] = $_GET['nome'];
		$_SESSION["idEscola"] =$_GET['idEscola'];
		$_SESSION["escola"] = $_GET['escola'];
		$_SESSION["idade"] = $_GET['idade'];
		$_SESSION["MP"] = $_GET['MP'];
		$_SESSION["graduacao"] = $_GET['graduacao'];
		$_SESSION["HP"] = $_GET['HP'];
		$_SESSION["sangue"] = $_GET['sangue'];
		$_SESSION["idPai"] = $_GET['idPai'];
		$_SESSION["pai"] = $_GET['pai'];
		$_SESSION["idMae"] = $_GET['idMae'];
		$_SESSION["mae"] = $_GET['mae'];
		$_SESSION["ultimoPost"] = $_GET['dtultimoPost'];
		$_SESSION["ultimoLogin"] = $_GET['dtultimoLogin'];
		$_SESSION["galeoes"] = $_GET['galeoes'];
		$_SESSION["sicles"] = $_GET['sicles'];
		$_SESSION["nuques"] = $_GET['nuques'];
		

		header("Location: homepersonagem.php");

		
		

	

?>
