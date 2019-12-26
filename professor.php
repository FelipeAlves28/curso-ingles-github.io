<!DOCTYPE html>


<?php
include 'conexao.php';
require('verifica.php');

$link = conexao();
if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 
if(@$_REQUEST["botao"]=="Cadastrar"){
	
	$nome = $_POST['nome'];
	


	$query = "INSERT INTO professor (nome)  VALUES ('{$_POST['nome']}')";
	$result = mysqli_query($link, $query);
	echo "cadastrado";
	if(!$result)
		echo mysqli_error($link);
}
?>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <ul class="nav-bar">
        <li><a href="Index.php" style="text-decoration: none;" class="nav-bar-centralizado">Home</a></li>
        <li><a href="cadastro.php" style="text-decoration: none;" class="nav-bar-centralizado">Cadastro</a></li>
        <li><a href="professor.php" style="text-decoration: none;" class="nav-bar-centralizado">Professor</a></li>
        <li><a href="entrada.php" style="text-decoration: none;" class="nav-bar-centralizado">Turmas</a></li>
        <li><a href="consulta.php" style="text-decoration: none;" class="nav-bar-centralizado">Consultas</a></li>
        <li><a href="cadastroUser.php" style="text-decoration: none;" class="nav-bar-centralizado">Cadastro Usuário</a></li>
        <li><a href="logout.php" style="text-decoration: none;" class="nav-bar-centralizado">Sair</a></li>
	
    </ul>


    <div class="row">
	
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
		
            <form action = "professor.php" method = "post">
	    	<h2 id="cadastro-titulo">Cadastro de Professor</h2>
            <label>Nome:</label><br>
            <input type="text" id="input-cadastro" name= "nome" placeholder=" Insira um nome" ><br>

            

            <div class="posicao-botao">
                <button type="submit" id="botao-cadastro" name = "botao" value = "Cadastrar">Cadastrar</button>
            </div>
            </form>
			
        </div>
        <div class="col-md-4">

        </div>

    </div>
</body>

</html>