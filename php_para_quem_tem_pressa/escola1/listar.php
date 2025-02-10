<?php
define('DS', DIRECTORY_SEPARATOR);

$filename = __DIR__ . DS . 'alunos.txt';

require 'arquivo.php';

$handle = fopen($filename, 'r');

while (! feof($handle)) {
    $record = explode(',', fread($handle, 80));
    if (! empty($record[0])) {
        echo '<tr>';
        echo "<td><a href=\"form.php?matricula={$record[0]}\">
    {$record[0]}</a></td>";
        echo "<td>{$record[1]}</td>";
        echo "<td><a href=\"apagar.php?matricula={$record[0]}\">
        Excluir</a></td>";
        echo '</tr>';
    }
}
fclose($handle);

