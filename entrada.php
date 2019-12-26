<!DOCTYPE html>


<?php
require('verifica.php');

if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 

?>


<?php
include 'conexao.php';

$link = conexao();
$categorias = listacategorias($link);
$locais = listalocal($link);
$professores = listaprofessor($link);

function listacategorias($link){
	$categorias = array();

    $query = "select * from horario";
    $resultado = mysqli_query($link, $query);

    // Executa um loop pegando todos resultados da tabela
    while ($categoria = mysqli_fetch_assoc($resultado)) {
    	array_push($categorias, $categoria);
    }
	return $categorias;

}

function listalocal($link){
	$locais = array();

    $query = "select * from turma";
    $resultado = mysqli_query($link, $query);

    // Executa um loop pegando todos resultados da tabela
    while ($local = mysqli_fetch_assoc($resultado)) {
    	array_push($locais, $local);
    }
	return $locais;

}
function listaprofessor($link){
	$professores = array();

    $query = "select * from professor";
    $resultado = mysqli_query($link, $query);

    // Executa um loop pegando todos resultados da tabela
    while ($professor = mysqli_fetch_assoc($resultado)) {
    	array_push($professores, $professor);
    }
	return $professores;

}

if(@$_REQUEST["botao"]=="Cadastrar"){

	$categoria = $_POST['categoria_id'];
    $local = $_POST['local_id'];
    $professor = $_POST['professor_id'];

    $query = "INSERT INTO turma_cads"."(hora,turma_3,prof)" 
    ."VALUES" ."('$categoria','$local','$professor')";
	$result = mysqli_query($link, $query);
	echo "cadastrado";
	if(!$result)
		echo mysqli_error($link);
}
?>

<html lang="pt-br">

<head>
    <title>Turmas</title>
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
            <form action = "entrada.php" method = "post">
	    	<h2 id="entrada-titulo">Turmas</h2>

            <label>Professores:</label><br>
            <select name="professor_id" id="input-cadastro" >
				<?php foreach ($professores as $professor) : ?>
					<option value="<?=$professor['nome']?>">&nbsp;<?=$professor['nome']?></option><br/>
				<?php endforeach ?>
				</select><br>

                <label>Turmas Disponiveis:</label><br>
            <select name="local_id" id="input-cadastro" >
				<?php foreach ($locais as $local) : ?>
					<option value="<?=$local['turma_2']?>">&nbsp;<?=$local['turma_2']?></option><br/>
				<?php endforeach ?>
				</select><br>

            <label>Horario:</label><br>
            <select name="categoria_id" id="input-cadastro" >
				<?php foreach ($categorias as $categoria) : ?>
					<option value="<?=$categoria['periodo']?>">&nbsp;<?=$categoria['periodo']?></option><br/>
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