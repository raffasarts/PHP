<?php 
 	
	require 'verifica.php';
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
	
	<?php  echo "Bem-Vindo " . $_SESSION["usuario"] . "!<BR>\n";
	$format = 'Y-m-d H:i:s';

	// Verifica e imprime quantidade de personagens no nome do usuário 
	$SQL = "SELECT idPersonagem
		FROM personagem 
		WHERE idUsuario = " . $_SESSION['id_usuario']; 
	
	$result= mysqli_query($conexao,$SQL);
	$total=mysqli_num_rows($result);
	
	echo "<section>";
	
		
			if ($total) {
				if($total<2){
				echo "<p>Você tem ".$total." personagem</p>";
			
				} else{
					echo "Você tem " .$total. " personagens \n";
						}
			}
			else{
				echo"<p>Você não possui personagens<p> <br>";
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

	* Exibe os personagens 
	*/ 
	echo"</section>";
	echo"<div class=\"container\">";
	  

		$SQL = "SELECT personagem.idPersonagem,personagem.idPai,personagem.idMae,personagem.nuques,personagem.galeoes,personagem.sicles, personagem.nomePersonagem, escolas.nomeEscola, personagem.idade, personagem.HP, personagem.MP, personagem.graduacao,personagem.idEscola, personagem.sangue,personagem.avatar, p.nomePersonagem AS 'nomePai',m.nomePersonagem AS 'nomeMae',personagem.criado, personagem.ultimoPost FROM personagem INNER JOIN escolas ON personagem.idEscola = escolas.idEscola INNER JOIN personagem p ON personagem.idPai = p.idPersonagem INNER JOIN personagem m ON personagem.idMae=m.idPersonagem"; 
		$result = mysqli_query($conexao,$SQL); 
		$total = mysqli_num_rows($result);
		

		if ($total) {
			

			
			echo"<table>";
			while ($dados = mysqli_fetch_array($result)) 
			{
	 

			echo"<div style=\"display:inline-block; width:auto; height:auto;\"class=\"personagem\">";
			echo"<form action=\"validaPersonagem.php\" method=\"POST\">";
			//Envia o id do Personagem
			echo"<input type=\"hidden\" name=\"idPersonagem\"value=\"".$dados["idPersonagem"]."\">";
			//Envia o nome do Personagem
			echo"<input type=\"hidden\" name=\"NomePersonagem\"value=\"".$dados["nomePersonagem"]."\">";
			//Envia o id da escola
			echo"<input type=\"hidden\" name=\"escolaId\"value=\"".$dados["idEscola"]."\">";
			//Envia o nome da escola
			echo"<input type=\"hidden\" name=\"nomeEscola\"value=\"".$dados["nomeEscola"]."\">";
			//Envia a idade
			echo"<input type=\"hidden\" name=\"idade\"value=\"".$dados["idade"]."\">";

			//Envia HP
			echo"<input type=\"hidden\" name=\"HP\"value=\"".$dados["HP"]."\">";

			//Envia MP
			echo"<input type=\"hidden\" name=\"MP\"value=\"".$dados["MP"]."\">";

			//Envia Graduação
			echo"<input type=\"hidden\" name=\"graduacao\"value=\"".$dados["graduacao"]."\">";

			//Envia Sangue
			echo"<input type=\"hidden\" name=\"sangue\"value=\"".$dados["sangue"]."\">";

			//Envia idPai
			echo"<input type=\"hidden\" name=\"pai\"value=\"".$dados["idPai"]."\">";

			//Envia idMãe
			echo"<input type=\"hidden\" name=\"mae\"value=\"".$dados["idMae"]."\">";

			//Envia Data de criação do personagem
			echo"<input type=\"hidden\" name=\"dtcriacao\"value=\"".$dados["criado"]."\">";
			//Envia Data em que foi feito o último post no personagem
			echo"<input type=\"hidden\" name=\"dtultimopost\"value=\"".$dados["ultimoPost"]."\">";
			//Envia galeões
			echo"<input type=\"hidden\" name=\"galeoes\"value=\"".$dados["galeoes"]."\">";
			//Envia nuques
			echo"<input type=\"hidden\" name=\"nuques\"value=\"".$dados["nuques"]."\">";

			//Envia sicles
			echo"<input type=\"hidden\" name=\"sicles\"value=\"".$dados["sicles"]."\">";

			// Exibe o avatar e redimensiona para o tamanho de 100px x 200px, exibindo o nome do personagem no atributo alt
			echo "<div style=\"float:left;\"class=\"avatar\"><img src=\"https://".$dados["avatar"]."\" alt=\" Avatar do Personagem ".$dados["nomePersonagem"]."\" width=\"100px\" height=\"200px\"></div>";

			echo"<div class=\"dados\"style=\"float:right; margin-left:5px;\">";
			

			echo" <b>Nome: </b><a href=\"personagem.php?id=" . $dados["idPersonagem"] . "\">" . stripslashes($dados["nomePersonagem"])."</a><br>";
			if ($dados["idEscola"]=1) {
				echo"<b>Escola: </b> Nenhuma<br>";
			}
			else{

			echo" <b>Escola: </b><a href=\"ver_escola.php?id=" . $dados["idEscola"] . "\">" . stripslashes($dados["nomeEscola"]) . "</a><br>";
			}

			echo" <b>Idade: </b>". $dados["idade"] ."<br>";

			echo" <b>HP: </b>". $dados["HP"] ."<br>";

			echo" <b>MP: </b>". $dados["MP"] ."<br>";

			echo" <b>Graduação: </b>". $dados["graduacao"] ."<br>";

			echo" <b>Sangue: </b>". $dados["sangue"] ."<br>";

			if($dados["idPai"]=0000000001){
				echo" <b>Pai: </b> <br>";

			}else{
				echo" <b>Pai: </b><a href=\"perfilpersonagem.php?id=" . $dados["idPai"] . "\">" . stripslashes($dados["nomePai"])."</a><br>";
					}
			if($dados["idMae"]=0000000001){
				echo"<b>Mãe: </b> <br>";

			}else{
				echo"<b>Mãe: </b><a href=\"perfilpersonagem.php?id=" . $dados["idPai"] . "\">" . stripslashes($dados["nomePai"])."</a><br>";
					}
			$criado = DateTime::createFromFormat($format, $dados['criado']);

			echo" <b>Criado em: </b>". $criado->format('d/m/Y') ."<br>";
			$ultimoPost = DateTime::createFromFormat($format, $dados['ultimoPost']);
			if ($ultimoPost<$criado) {
				echo"<b>Último post em: </b> <br>";
			}else{

				echo"<b>Último post em: </b>". $ultimoPost->format('d/m/Y às H:i:s') ."<br>";
			}
			while($dados["nuques"]>=29) {
				$dados["nuques"]=$dados["nuques"]-29;
				$dados["sicles"]++;
			
			}

			while ($dados["sicles"]>=17) {
				$dados["sicles"]=$dados["sicles"]-17;
				$dados["galeoes"]++;
			}

			
			

			echo "<div class=\"money\"><b>Galeões:</b> ".$dados["galeoes"]." <b>Sicles:</b>".$dados["sicles"]." <b>Nuques:</b> ".$dados["nuques"]."</div>";

			echo"<input type=\"submit\" value=\"Logar\"";
			echo "</form>";
			

			
// Fecha tabela 
			
			 }			

echo"</div>";

			echo"</table>";
		} 
			else 
				{ 
					echo "<B>Nenhum Personagem Cadastrado</B>\n"; 	
				} 
		
		

		
		
	echo "</div>"; 

echo"</div>";
	?>



</body>
</html>
