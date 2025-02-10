<?php
//Cria o arquivo se não existir
if (! file_exists($filename))
{
    if (!is_writable(__DIR__))
    {
        echo 'Não pode criar o arquivo alunos.txt';
        goto EOF;
    }
    $handle = fopen($filename, 'a');
    fclose($handle);
    chmod($filename, 0777);
}
EOF:
