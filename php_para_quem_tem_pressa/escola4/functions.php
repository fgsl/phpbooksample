<?php
function getCadastro()
{
	return (isset($_GET['cadastro']) ? $_GET['cadastro'] : $_POST['cadastro']);
}

function getEntidade()
{
	$cadastro = getCadastro();
	$entidade = ($cadastro == 'alunos' ? 'Aluno' : 'Professor');
	$className = 'Entidade\\' . $entidade;
	return new $className();
}

function autoload($className)
{
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$className) . '.php';
    require $fileName;
}
spl_autoload_register('autoload');
