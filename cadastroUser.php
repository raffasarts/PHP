<?php
require "conn.php";

$nome = $_POST['nome'];
$email = $_POST['email'];

 if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
    echo "<script> $(\"#mensagem\").html('<strong>Erro! </strong>' + email inválido);</script>";
	exit();
endif;

$nascimento=$_POST['nascimento'];

if ($_POST['senha']!=$_POST['csenha']) {
echo "<script> $(\"#erroSenha\").html('<strong>Erro! </strong>' + senhas não conferem);</script>";
header('Location: index.html');

} else{
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
}

$login = $_POST['login'];

$_POST['termos']=(isset($_POST['termos'])) ? true : false;
$termos= $_POST['termos'];


$_POST['dadosValidos']=(isset($_POST['dadosValidos'])) ? true : false;
$dadosValidos = $_POST['dadosValidos'];


$_POST['newslater']=(isset($_POST['newslater'])) ? true : false;
$newslater=$_POST['newslater'];

echo ($nome." <br>".$email."<br> ".$nascimento." <br>".$senha."<br> ".$login. "<br>".$termos."<br>".$dadosValidos."<br>".$newslater);


$sql = "INSERT INTO usuarios (login, senha, email, nome, dtNascimento, termos, dadosValidos, newslater) VALUES ( ?, ?, ?, ?, ?,?, ?, ?)";

$stm = $conexao->prepare($sql);

$retorno=$stm->execute(array($login,$senha,$email,$nome,$nascimento,$termos,$dadosValidos,$newslater));

if ($retorno) {
	echo "Cadastrado com sucesso";
}
else{
	echo "Falha ao cadastrar";
}
?>

