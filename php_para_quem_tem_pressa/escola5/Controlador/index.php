<?php
require '..' . DIRECTORY_SEPARATOR . 'functions.php';

$controladorEntidade = new Controlador\ControladorEntidade();
$controladorEntidade->despachar($_GET,$_POST);
