
<?php
session_start();
 
if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'){
	header("Location: selectPersonagem.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
		
		

	    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		       
		
		<title>Login</title>
	</head>
<body>

<form id="loginform"  role="form" action="validaLogin.php" method="POST">
	
	<div class="form-group has-feedback">
			   <label for="login" class="control-label">Login</label>
			    
			   <input type="text" 
			   
			   class="form-control" 
			   id="inputLogin" 
			   name="login" 
			   placeholder="Insira seu login" 
			   title="Insira seu Login" 
			   required>
			    
			   <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			  


		  </div>

	<div class="form-group has-feedback">
			   <label for="inputSenha" class="control-label">Senha</label>
			    
			   <input type="password" 
			   
			   class="form-control" 
			   id="inputSenha" 
			   name="senha" 
			   placeholder="Insira sua senha" 
			   title="Insira sua Senha" 
			   required>
			    
			   <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			   <div class="help-block with-errors" id="login-alert"><span id="mensagem"></span></div>
	</div> 


	
	<div class="form-group margin-top-pq">
        <div class="col-sm-12 controls">
            <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
              Entrar
            </button>
        </div>
    </div> 
	

</form>

<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script >$('document').ready(function(){

  $("#btn-login").click(function(){
    var data = $("#loginform").serialize();
      
    $.ajax({
      type : 'POST',
      url  : 'Login.php',
      data : data,
      dataType: 'json',
      beforeSend: function()
      { 
        $("#btn-login").html('Validando ...');
      },
      success :  function(response){            
        if(response.codigo == "1"){ 
          $("#btn-login").html('Entrar');
          $("#login-alert").css('display', 'none')
          window.location.href = "selectPersonagem.php";
        }
        else if(response.codigo == "0"){     
          $("#btn-login").html('Entrar');
          $("#login-alert").css('display', 'block');
          $("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
        }
        }
    });
  });

});</script>
</body>
</html>