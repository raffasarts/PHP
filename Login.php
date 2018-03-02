
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<h2>Área Restrita</h2>
<form action="valida.php" method="post">
	
	<label for="usuario">Usuário</label><input type="text" name="usuario" placeholder="Digite o Nome do Usuário" required="true"> 

	<br><br>

	<label for="senha"> Senha</label>
	<input type="password" name="senha" placeholder="Digite sua senha" required="true">
	<br>
	<br>
	<input type="submit" name="btnLogin" value="Acessar">
	

</form>
<p>
	<?php 
		$erro = (isset($_GET['erro'])) ? $_GET['erro'] : null; 
		echo $erro;  
	?>
</p>
</body>
</html>