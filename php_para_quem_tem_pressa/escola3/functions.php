<?php
/**
 * Retorna o nome da chave de um cadastro 
 * @return string|NULL
 */
function getChave(?string $cadastro = null)
{
    switch ($cadastro) {
    	case 'alunos':
    	   return 'matricula';
    	case 'professores':
    	   return 'codigo';
    }
    return NULL;
}

