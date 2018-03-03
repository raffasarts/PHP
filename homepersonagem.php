<?php 
 	
	require 'verifica.php';
	require 'verificaPersonagem.php';
	require 'conn.php';


?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
			<title>Personagens</title>
		</head>
	<body>
	
	<?php  echo "Bem-Vindo " . $_SESSION["personagem"] . "!<BR>\n";
	$format = 'Y-m-d H:i:s';
	$SQL = "UPDATE personagem SET galeoes =".$_SESSION["galeoes"]." , sicles =".$_SESSION["sicles"]." , nuques =".$_SESSION["nuques"].", ultimoLogin = CURRENT_TIME() WHERE personagem.idPersonagem =".$_SESSION["id_personagem"];
		$result = mysqli_query($conexao,$SQL); 
		echo " | <a href=\"index.php\">Sair do Personagem</a>";

	?>

</body>
</html>
