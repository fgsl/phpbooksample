<?php
namespace Controlador;

class ControladorEntidade
{
    private $requisicao = NULL;
    private $dados = NULL;
    
    public function despachar(array $requisicao, array $dados)
    {
        $this->requisicao = $requisicao;
        $this->dados = $dados;
        $metodo = $requisicao['metodo'];
        $this->$metodo();
	$cadastro = \getCadastro();
        header("Location: ../$cadastro.php");
    }
    
    private function apagar()
    {
        $class = \getEntidade();
        call_user_func([$class,'apagar'],$this->requisicao['chave']);        
    }
    
    private function gravar()
    {
        $class = \getEntidade();
        call_user_func([$class,'gravar'],$this->dados);       
    }
}
