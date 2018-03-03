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
	  

		$SQL = "SELECT personagem.*,escolas.nomeEscola, p.nomePersonagem AS 'nomePai',m.nomePersonagem AS 'nomeMae' FROM personagem INNER JOIN escolas ON personagem.idEscola = escolas.idEscola INNER JOIN personagem p ON personagem.idPai = p.idPersonagem INNER JOIN personagem m ON personagem.idMae=m.idPersonagem WHERE personagem.idUsuario=".$_SESSION['id_usuario'];
		$result = mysqli_query($conexao,$SQL); 
		$total = mysqli_num_rows($result);
		

		if ($total) {
			
			echo("<table width=\"35%\" cellspacing=\"1\"><tbody>");
		
			while ($dados = mysqli_fetch_array($result)) 
			{

	 

			
			

			// Exibe o avatar e redimensiona para o tamanho de 100px x 200px, exibindo o nome do personagem no atributo alt
			echo "<tr><td><div style=\"float:left; \"class=\"avatar\"><img src=\"https://".$dados["avatar"]."\" alt=\" Avatar do Personagem ".$dados["nomePersonagem"]."\" width=\"100px\" height=\"200px\"></div></td>";

			
			

			echo" <td><b>Nome: </b><a href=\"personagem.php?id=" . $dados["idPersonagem"] . "\">" . stripslashes($dados["nomePersonagem"])."</a><br>";
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

				echo"<b>Último post em: </b>". $ultimoPost->format('d/m/Y  H:i:s') ."<br></td></tr>";
			}

			$ultimoLogin = DateTime::createFromFormat($format, $dados['ultimoLogin']);
			if ($ultimoLogin<$criado) {
				echo"<b>Último Login em: </b> <br>";
			}else{

				echo"<b>Último Login em: </b>". $ultimoLogin->format('d/m/Y  H:i:s') ."<br></td></tr>";
			}

			
			while($dados["nuques"]>=29) {
				$dados["nuques"]=$dados["nuques"]-29;
				$dados["sicles"]++;
			
			}

			while ($dados["sicles"]>=17) {
				$dados["sicles"]=$dados["sicles"]-17;
				$dados["galeoes"]++;
			}

			
		


			echo "<tr><td><div class=\"money\"><b>G$:</b> ".$dados["galeoes"]." <br><b>S$:</b>".$dados["sicles"]." <br><b>N$:</b> ".$dados["nuques"]."<br></div></td>";
			
			


			echo "<td align=\"right\"><a href=\"validapersonagem.php?id=".$dados["idPersonagem"].
			"&nome=".$dados["nomePersonagem"].
			"&idade=".$dados["idade"].
			"&HP=".$dados["HP"].
			"&MP=".$dados["MP"].
			"&sangue=".$dados["sangue"].
			"&graduacao=".$dados["graduacao"].
			"&idEscola=".$dados["idEscola"].
			"&escola=".$dados["nomeEscola"].
			"&idMae=".$dados["idMae"].
			"&mae=".$dados["nomeMae"].
			"&idPai=".$dados["idPai"].
			"&pai=".$dados["nomePai"].
			"&galeoes=".$dados["galeoes"].
			"&sicles=".$dados["sicles"].
			"&nuques=".$dados["nuques"].
			"&avatar=".$dados["avatar"].
			"&dtultimoPost=".$dados["ultimoPost"].
			"&dtultimoLogin=".$dados["ultimoLogin"].
			
			"\"> Logar</a></td></tr>";


			
			

			

			
			 }			




			
		} 
			else 
				{ 
					echo "<B>Nenhum Personagem Cadastrado</B>\n"; 	
				} 
		
		

		
		
	 
echo"</tbody></table>";
echo"</div>";



	?>



</body>
</html>
