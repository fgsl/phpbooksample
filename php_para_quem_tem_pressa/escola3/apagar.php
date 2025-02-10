<?php
require 'pdo.php';
require 'functions.php';

$cadastro = isset($_GET['cadastro']) ? $_GET['cadastro'] : NULL;
$nomeChave = getChave($cadastro);

$chave = (integer) (isset($_GET[$nomeChave]) ? $_GET[$nomeChave] : NULL);

$pdo->exec("DELETE FROM $cadastro WHERE $nomeChave=$chave");

header("Location: $cadastro.php?cadastro=$cadastro");

