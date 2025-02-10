<?php
define('DS', DIRECTORY_SEPARATOR);

$matricula = ($_GET['matricula'] ?? NULL);
$nome = '';

if (! is_null($matricula)) {
    $filename = __DIR__ . DS . 'alunos.txt';
    $handle = fopen($filename, 'r');
    
    while (! feof($handle)) {
        $record = explode(',', fread($handle, 80));
        if (! empty($record[0]) && $record[0] == $matricula) {
            $nome = $record[1];
        }
    }
    fclose($handle);
}
