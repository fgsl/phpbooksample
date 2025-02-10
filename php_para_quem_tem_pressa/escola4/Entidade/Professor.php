<?php
namespace Entidade;

class Professor extends EntidadeAbstrata
{
    protected ?int $codigo;
    protected ?string $nome;
    
    protected static $tabela = 'professores';

    public static function getChave()
    {
        return 'codigo';
    }
}
