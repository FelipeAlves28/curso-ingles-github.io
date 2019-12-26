
<html>

 		<head>
                <title>Cadastro de User</title>
                <meta charset="utf-8">
                <link rel="stylesheet" href="css/home.css">
                <link rel="stylesheet" href="css/CadastroUser.css">
		</head>

<body>
       
  <?php
 include 'conexao.php';
require('verifica.php');
$link = conexao();
if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='index.php';</script>"; 
if(@$_REQUEST["botao"]=="Cadastrar"){
	
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$op = $_POST['op'];

	$query = "INSERT INTO usuario"."(login,senha,nivel
)" ."VALUES" ."('$login','$senha','$op')";
	$result = mysqli_query($link, $query);
	echo "cadastrado";
	if(!$result)
		echo mysqli_error($link);
}

?>
<form action=cadastroUser.php method=post>
	
    <div class="row">

    	<div class="col-md-4"></div>

    		<div class="col-md-4">
    				
				<div class="bloco-cadastro">
					<h2 id="titulo-login">Cadastro</h2>
					<label id="label-usuario">Usuario:</label><br>
					<input type=text name=login id="input-loginsenha" placeholder=" Usuario"><br>

					<label id="label-senha">Senha:</label><br> 
                    <input type=password name=senha id="input-loginsenha" placeholder=" Senha"><br>
                    
					<label id="titulo-login">Nivel:</label><br>
					<input type=radio name=op value=ADM>  ADM <input type=radio name=op value=USER id="titulo-login">Usuario comum <br>

						<div class="posicao-botao">
							<input type="submit"id="botao-login" name=botao value=Cadastrar></a>
							<a href="Index.php" style="text-decoration: none;" id="botao-login">Voltar</a>
						</div>
				</div>
			</div>
	</div>

    <div class="col-md-4"></div>
</form>
</body>

</html>









