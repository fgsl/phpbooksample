<?php
define('DS', DIRECTORY_SEPARATOR);

$nome = ($_POST['nome'] ?? NULL);
$matricula = ($_POST['matricula'] ?? NULL);

if (! is_null($nome)) {
    $filename = __DIR__ . DS . 'alunos.txt';
    
    require 'arquivo.php';

    // abre no começo para leitura
    $handle = fopen($filename, 'r');
    
    // inclusão
    if (empty($matricula)) {
        
        $ultimaMatricula = 0;
        while (! feof($handle)) {
            $record = explode(',', fread($handle, 80));
            $ultimaMatricula = (isset($record[0]) && empty($record[0])) ? $ultimaMatricula : $record[0];
        }
        fclose($handle);
        $handle = fopen(__DIR__ . DS . 'alunos.txt', 'a');
        $matricula = $ultimaMatricula + 1;
        fwrite($handle, substr($matricula . ',' . $nome . ',' . str_repeat(' ', 80), 0, 78) . ",\n", 80);
        fclose($handle);
    } else     // alteração
    {
        $tmpFilename = __DIR__ . DS . 'alunos.tmp';
        $tmpHandle = fopen($tmpFilename, 'w');        
        while (! feof($handle)) {
            $row = fread($handle, 80);
            $record = explode(',', $row);
            $ultimaMatricula = (isset($record[0]) && empty($record[0])) ? $ultimaMatricula : $record[0];
            if ($ultimaMatricula == $matricula) {
                fwrite($tmpHandle, substr($matricula . ',' . $nome . ',' . str_repeat(' ', 80), 0, 78) . ",\n", 80);
            }
            else {
                fwrite($tmpHandle, $row);
            }
        }
        fclose($tmpHandle);
        fclose($handle);
        unlink($filename);
        copy($tmpFilename, $filename);
    }
}
header('Location:index.php');

