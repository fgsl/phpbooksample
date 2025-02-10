<?php
require 'functions.php';
$chave = $_GET['chave'];
$entidade = getEntidade();
$entidade = call_user_func([$entidade,
'get'],$chave);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inclusão de <?=$_GET['cadastro']?></title>
</head>
<body>
<form method="post" action="gravar.php">
Nome <input type="text" name="nome" value="<?=$entidade->getNome()?>" autofocus="autofocus">
<input type="hidden" name="chave" value="<?=$chave?>">
<input type="hidden" name="cadastro" value="<?=$_GET['cadastro']?>">
<input type="submit" value="gravar">
</form>
</html>
