<?php
require 'pdo.php';

$cadastro = isset($_GET['cadastro']) ? $_GET['cadastro'] : NULL;

$resultSet = $pdo->query("SELECT * FROM $cadastro");

$records = $resultSet->fetchAll();
foreach($records as $record)
{
    $chave = array_key_first($record);
    echo '<tr>';
    echo 
    "<td><a href=\"form.php?$chave={$record[$chave]}&cadastro=$cadastro\">
    {$record[$chave]}</a></td>";
    echo "<td>{$record['nome']}</td>";
    echo
    "<td><a href=\"apagar.php?$chave={$record[$chave]}&cadastro=$cadastro\">
    Excluir</a></td>";
    echo '</tr>';
}
