<?php 
 	ini_set('default_charset','UTF-8');
	require 'verifica.php';
	require 'conn.php';
	echo "<!DOCTYPE html>
	<html>
	<head>
		<title>Persongens</title>
	</head>
	<body>";
	// Imprime mensagem de boas vindas 
	echo "<font face=\"Verdana\" size=2px>Bem-Vindo " . $_SESSION["usuario"] . "!<BR>\n";
	$format = 'Y-m-d H:i:s';

	// Verifica e imprime quantidade de notícias no nome do usuário 
	$SQL = "SELECT idPersonagem
		FROM personagem 
		WHERE idUsuario = " . $_SESSION['id_usuario']; 
	
	$result= mysqli_query($conexao,$SQL);
	$total=mysqli_num_rows($result);

	if ($total) {
		echo "Você tem " .$total. " personagens \n";
	}
	else{
		echo "Você não possui personagens <br>";
	}

	/** 
	* Verifica se usuário tem permissão para criar novos personagens. 
	* Caso positivo, imprime link para criação do personagem 
	*/ 
	
	if(($_SESSION['pcAdulto'] > 0) ||($_SESSION['pcCrianca'] > 0)) { 
	echo " | <a href=\"novoPersonagem.php\">Criar Novo Personagem</a>\n"; 
	} 
	else{
	echo " | Você não pode criar novos personagens no momento \n"; 

	}

	// Imprime link de logout 
	echo " | <a href=\"sair.php\">Sair do Sistema</a>"; 

	echo "<br><br>\n"; 

	/** 

	* Imprime as notícias 
	*/ 

	$SQL = "SELECT personagem.idPersonagem,personagem.idPai,personagem.idMae, personagem.nomeP, personagem.nmeio, personagem.nultimo, escolas.nomeEscola, personagem.idade, personagem.HP, personagem.MP, personagem.graduacao, personagem.sangue, p.nomeP AS 'nomePai', p.nmeio AS 'nmeioPai',p.nultimo AS 'nultimoPai',m.nomeP AS 'nomeMãe', m.nmeio AS 'nmeioMãe',m.nultimo AS 'nultimoMae',personagem.criado FROM personagem INNER JOIN escolas ON personagem.idEscola = escolas.idEscola INNER JOIN personagem p ON personagem.idPai = p.idPersonagem INNER JOIN personagem m ON personagem.idMae=m.idPersonagem"; 
	$result = mysqli_query($conexao,$SQL); 
	$total = mysqli_num_rows($result);
	

	if ($total) {
		

		

		while ($dados = mysqli_fetch_array($result)) 
		{

		echo"<div class=\"personagem\">";
		echo"<ul>";
		echo"<li><b>Nome </b><a href=\"personagem.php?id=" . $dados["idPersonagem"] . "\">" . stripslashes($dados["nomeP"]) ." " . stripslashes($dados["nmeio"]) ." " . stripslashes($dados["nultimo"]) ."</a></li>";
		echo"<li><b>Escola </b><a href=\"ver_escola.php?id=" . $dados["nomeEscola"] . "\">" . stripslashes($dados["nomeEscola"]) . "</a></li>";
		echo"<li><b>Idade </b>". $dados["idade"] ."</li>";
		echo"<li><b>HP </b>". $dados["HP"] ."</li>";
		echo"<li><b>MP </b>". $dados["MP"] ."</li>";
		echo"<li><b>Graduação </b>". $dados["graduacao"] ."</li>";
		echo"<li><b>Sangue </b>". $dados["sangue"] ."</li>";
		echo"<li><b>Pai </b><a href=\"homepersonagem.php?id=" . $dados["idPai"] . "\">" . stripslashes($dados["nomePai"]) ." " . stripslashes($dados["nmeio"]) ." " . stripslashes($dados["nultimo"]) ."</a></li>";
		$date = DateTime::createFromFormat($format, $dados['criado']);
		echo"<li><b>Criado em </b>". $date->format('d-m-Y H:i:s') ."</li>";
		echo"</ul>";

		 }			
	


		// Fecha tabela 
		echo "</div>\n"; 
	} 
		else 
			{ 
				echo "<B>Nenhum Personagem Cadastrado</B>\n"; 	
			} 


		
		
	

	

echo "</body>
	</html>";

?>