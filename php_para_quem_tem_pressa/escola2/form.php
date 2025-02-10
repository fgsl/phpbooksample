<?php require 'aluno.php'?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inclusão de alunos</title>
</head>
<body>
<form method="post" action="gravar.php">
Nome <input type="text" name="nome" value="<?=$nome?>" autofocus="autofocus">
<input type="hidden" name="matricula" value="<?=$matricula?>">
<input type="submit" value="gravar">
</form>
</html>

