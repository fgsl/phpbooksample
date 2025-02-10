<?php
require 'pdo.php';
define('DS', DIRECTORY_SEPARATOR);

$matricula = ($_GET['matricula'] ?? NULL);
$nome = '';

if (! is_null($matricula)) {

    $resultSet = $pdo->query("SELECT * FROM alunos WHERE matricula=$matricula");
    $nome = $resultSet->fetchColumn(1); 
}
