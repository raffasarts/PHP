<?php 
//inclue o arquivo de bd
require "conn.php";
//inicia a sessão
session_start();

if ( !isset( $_POST ) || empty( $_POST ) ) {
	$erro = 'Nada foi postado.';
}



//recupera_login
$login = isset($_POST['usuario']) ? addslashes(trim($_POST["usuario"])) : FALSE;

//Recupera a senha
$senha = isset($_POST['senha']) ? addslashes(trim($_POST["senha"])) : FALSE;
//se o usuário não fornecer senha ou login



/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/ 


$SQL = "SELECT idUsuario,login,senha,email, cPersonagemA,cPersonagemC
FROM usuarios WHERE login= '".$login."'";

$result= mysqli_query($conexao,$SQL);
$total=mysqli_num_rows($result);



if($total>0) 
{ 
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
$dados = mysqli_fetch_array($result, MYSQLI_ASSOC) ; 
echo "<br>";

	// verificação de senha

	if ($senha === $dados['senha']) {
		//passa os dados e redireciona o usuário
		$_SESSION["id_usuario"] = $dados['idUsuario'];
		$_SESSION["usuario"] = $dados['login'];
		$_SESSION["pcAdulto"] = $dados['cPersonagemA'];
		$_SESSION["pcCrianca"] = $dados['cPersonagemC'];
		header("Location: index.php");
		
	}
	else{
		
		$erro = "Senha inválida";
		
	}
}
//Login Inválido

else{
$erro = "Login Inválido";

}
 if ( $erro ) {
	 header("Location: login.php?erro=".$erro."");
}

?>
