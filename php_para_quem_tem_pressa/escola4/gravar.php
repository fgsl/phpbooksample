<?php
require 'functions.php';

call_user_func([getEntidade(),'gravar'],$_POST);
$cadastro = getCadastro();
header("Location:$cadastro.php");
