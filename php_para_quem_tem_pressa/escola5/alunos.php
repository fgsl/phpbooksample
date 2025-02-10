<?php 
require 'functions.php';
use Entidade\Aluno;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de Alunos</title>
</head>
<body>
	<h1>Cadastro de Alunos</h1>
	<a href="form.php?cadastro=alunos">Incluir aluno</a>
	<table>
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
<?php
echo Aluno::listar();
?>
</tbody>
	</table>
	<a href="index.php">Homepage</a>
</body>
</html>
