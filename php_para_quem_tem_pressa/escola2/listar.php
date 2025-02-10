<?php
require 'pdo.php';

$resultSet = $pdo->query('SELECT * FROM alunos');

$records = $resultSet->fetchAll();
foreach($records as $record)
{
    echo '<tr>';
    echo 
    "<td><a href=\"form.php?matricula={$record['matricula']}\">
    {$record['matricula']}</a></td>";
    echo "<td>{$record['nome']}</td>";
    echo
    "<td><a href=\"apagar.php?matricula={$record['matricula']}\">
    Excluir</a></td>";
    echo '</tr>';
}
