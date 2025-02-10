<?php
require 'functions.php';
$class = getEntidade();
call_user_func([$class,'apagar'],$_GET['chave']);
$cadastro = getCadastro();
header("Location: $cadastro.php");
