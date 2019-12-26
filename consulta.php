<html>
<head>
    <title>Consultas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/consulta.css">
<?php 
	include ('conexao.php'); 

	function invdata($data) 
	{
		$parte = explode("-", $data);
		return ($parte[2] . "-" . $parte[1] . "-" . $parte[0]);
	} 
?>
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

    <h2 id="titulo-consulta">Relatorios Por Aluno</h2>
<?php 

 if (@!$_REQUEST['botao'] == "Gerar") { ?>

<form action="consulta.php? botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td class="td-consulta" width="10%" align="right">Nome:</td>
    <td  class="td-consulta" width="40%"><input type="text" name="nome"  /></td>
	
	<td class="td-consulta" width="40%">Ordem:
	<select name=ordem>
	<option value="id"> codigo </option>
	<option value="nome"> nome </option>
	</select>
</td>

<td rowspan=2 class="td-consulta"> <input type="submit" name="botao" value="Gerar" /> </td>
  </tr>

</table>
</form>

<?php 

 } // se eu não clicar no botao gravar
 if (@$_REQUEST['botao'] == "Gerar") { 
 
 
 ?>
<div class = "container">
<table class = "table" width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <td class ="td-consulta" colspan=5 align="center"><a href=consulta.php style="color: white; text-decoration:none"> Relat&oacute;rio de Alunos</a></td>
  </tr>
  
  <tr bgcolor="#9999FF">
    <th  class ="td-consulta" width="5%">C&oacute;d</th>
    <th class ="td-consulta" width="30%">Nome</th>
<th class ="td-consulta" width="30%">Turma</th>
  </tr>

<?php
$link = conexao();
	$nome = $_POST['nome'];
	$ordem = $_POST['ordem'];
	
	$query = "SELECT *
			  FROM aluno 
			  WHERE id > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= " ORDER by $ordem";
    $result = mysqli_query($link, $query);
	

	
	

/*
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
	while($row_usuario = mysqli_fetch_assoc($result))
	{
		
	?>
    
    <tr>
      <th class="td-consulta" width="5%"><?php echo $row_usuario['id']; ?></th>
      <th class="td-consulta"width="30%"><?php echo $row_usuario['nome']; ?></th>
      <th class="td-consulta"  width="12%"><?php echo $row_usuario['turma_alu']; ?></th>

    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>
</body>