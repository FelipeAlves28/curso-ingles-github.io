<?php
include ('conexao.php');
session_start(); // inicia a sessao	

$link = conexao();
if (@$_REQUEST['botao']=="Entrar")
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($link,$query);
	


	while ($coluna=mysqli_fetch_array($result)) 
	{
		
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		// caso queira direcionar para páginas diferentes
		$niv = $coluna['nivel'];
		if($niv == "USER"){ 
			header("Location: index.php"); 
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: index.php"); 
			exit; 
		}
		// ----------------------------------------------
		
}

}


?>

<html>

 		<head>
                <title>login</title>
                <meta charset="utf-8">
                <link rel="stylesheet" href="css/home.css">
                <link rel="stylesheet" href="css/login.css">
      </head>

<body style=" background-color: purple; ">
       
  
<form action=# method=post>
	
    <div class="row">

    	<div class="col-md-4"></div>

    		<div class="col-md-4">
    			
				
				<div class="bloco-login">
					<h2 id="titulo-login" >Login</h2>
					<label id="label-usuario">Usuario:</label><br>
					<input type=text name=login id="input-loginsenha" placeholder=" Usuario"><br>

					<label id="label-senha">Senha:</label><br> 
					<input type=password name=senha id="input-loginsenha" placeholder=" Senha"><br>

						<div class="posicao-botao">
							<input type="submit"id="botao-login" name=botao value=Entrar>
						</div>
				</div>
			</div>
	</div>

    <div class="col-md-4"></div>
</form>
</body>

</html>









