<?php 
require 'functions.php';
use Entidade\Professor;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de Professores</title>
</head>
<body>
	<h1>Cadastro de Professores</h1>
	<a href="form.php?cadastro=professores">Incluir professor</a>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
<?php
echo Professor::listar();
?>
</tbody>
	</table>
	<a href="index.php">Homepage</a>
</body>
</html>
