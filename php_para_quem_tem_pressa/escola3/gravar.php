<?php
require 'pdo.php';
require 'functions.php';

$cadastro = isset($_POST['cadastro']) ? $_POST['cadastro'] : NULL;

if (is_null($cadastro)){
        echo 'Cadastro não informado';
        exit();
}

$nomeChave = getChave($cadastro);

$nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
$chave = (isset($_POST['chave']) ? (integer)$_POST['chave'] : NULL);

if (! is_null($nome)) {
    $sql = "INSERT INTO $cadastro(nome) values ('$nome')";

    if (!empty($chave) ) {
        $sql = 
        "UPDATE $cadastro SET nome='$nome' 
        WHERE $nomeChave=$chave";
    }
    if (! $pdo->exec($sql)) {
        echo 'Não conseguiu gravar o registro';
        exit();
    }
}

header("Location:$cadastro.php?cadastro=$cadastro");
