<!DOCTYPE html>


<?php
include 'conexao.php';
require('verifica.php');


$link = conexao();
//$categorias = listacategorias($link);
$locais = listalocal($link);
//$professores = listaprofessor($link);
//$turmas = listaturmas($link);


function listalocal($link){
	$locais = array();

    $query = "select * from turma_cads";
    $resultado = mysqli_query($link, $query);

    // Executa um loop pegando todos resultados da tabela
    while ($local = mysqli_fetch_assoc($resultado)) {
    	array_push($locais, $local);
    }
	return $locais;

}

$link = conexao();
if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 
if(@$_REQUEST["botao"]=="Cadastrar"){
	
	$nome = $_POST['nome'];
	$telefone = $_POST['tel'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	$local = $_POST['local_id'];


	$query = "INSERT INTO aluno (nome,fone,login,senha,email,turma_alu
)  VALUES ('{$_POST['nome']}','{$_POST['tel']}','{$_POST['login']}',
    '{$_POST['senha']}','{$_POST['email']}','{$_POST['local_id']}')";
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
		
            <form action = "cadastro.php" method = "post">
	    	<h2 id="cadastro-titulo">Cadastro de Alunos</h2>
            <label>Nome:</label><br>
            <input type="text" id="input-cadastro" name= "nome" placeholder=" Insira um nome" ><br>

            <label>Telefone:</label><br>
            <input type="text" id="input-cadastro" name= "tel" placeholder=" Insira seu telefone" ><br>
            
			<label>Login:</label><br>
            <input type="text" id="input-cadastro" name= "login" placeholder=" Insira a sua cidade" ><br>

            <label>Senha:</label><br>
            <input type="text" id="input-cadastro" name= "senha" placeholder=" Insira a senha" ><br>


			<label>Email:</label><br>
            <input type="text" id="input-cadastro" name= "email" placeholder=" Insira seu email" ><br>


			<label>Turmas Disponiveis:</label><br>
            <select name="local_id" id="input-cadastro" >
				<?php foreach ($locais as $local) : ?>
					<option value="<?=$local['turma_3']?>">&nbsp;<?=$local['turma_3']?></option><br/>
				<?php endforeach ?>
				</select><br>	


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