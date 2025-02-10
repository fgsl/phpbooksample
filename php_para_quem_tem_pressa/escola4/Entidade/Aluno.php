<?php
namespace Entidade;

class Aluno extends EntidadeAbstrata
{
    protected ?int $matricula;
    protected ?string $nome;
    
    protected static $tabela = 'alunos';
    
    public static function getChave()
    {
        return 'matricula';
    }
}
