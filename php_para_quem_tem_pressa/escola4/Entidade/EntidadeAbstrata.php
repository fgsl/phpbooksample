<?php
namespace Entidade;

abstract class EntidadeAbstrata
{
    protected static ?\PDO $pdo = NULL;
    
    protected static $tabela = NULL;

   /**
     * get/set genéricos
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args)
    {
        $prefix = substr($method,0,3);
        if ($prefix == 'get')
        {
            $attribute = lcfirst(substr($method,3));
            return $this->$attribute;
        }
        if ($prefix == 'set')
        {
            $attribute = lcfirst(substr($method,3));
            $this->$attribute = $args[0];
            return $this;
        }
    }
    
    abstract public static function getChave();
    
    public static function getPdo(): \PDO
    {
        if (self::$pdo == NULL)
        {
            self::$pdo = new \PDO('mysql:dbname=escola;host=localhost','root','admin');
        }
        return self::$pdo;
    }
    
    public static function listar()
    {
        $resultSet = self::getPdo()->query('SELECT * FROM '. static::$tabela);       
    
        $records = $resultSet->fetchAll();
    
        $html = '';
    
        $chave = static::getChave();
    
	    $cadastro = static::$tabela;

        foreach($records as $record)
        {
            $html .= <<<BLOCO
            <tr>
            <td>
            <a href="form.php?cadastro=$cadastro&chave={$record[$chave]}">
            {$record[$chave]}</a>
            </td>
            <td>{$record['nome']}</td>
            <td>
            <a href="apagar.php?cadastro=$cadastro&chave={$record[$chave]}">
            Excluir</a>
            </td>
            </tr>
BLOCO;
        }
        return $html;
    }
    
    public static function get($chave): object
    {
        $nomeChave = static::getChave();
    
        $nome = '';
        
        $cadastro = static::$tabela;

        if (!is_null($chave)){
            $resultSet = self::getPdo()->query(
                "SELECT * FROM $cadastro WHERE $nomeChave=$chave");
    
            $nome = $resultSet->fetchColumn(1);
        }
        
        $class = get_called_class();
        $method = 'set' . ucfirst($nomeChave);
    
        $entidade = new $class();
        $entidade->$method($chave)
        ->setNome($nome);
    
        return $entidade;
    }
    
    public function gravar(array $dados)
    {
        $nomeChave = static::getChave();
         
        $nome = isset($dados['nome']) ? $dados['nome'] : NULL;
        $chave = (integer) (isset($dados['chave']) ? $dados['chave'] : NULL);
        
        $cadastro = static::$tabela;
         
        if (! is_null($nome)) {
            $sql = "INSERT INTO $cadastro(nome) values ('$nome')";
             
            if (!empty($chave)) {
                $sql =
                "UPDATE $cadastro SET nome='$nome'
                WHERE $nomeChave=$chave";
            }
            
            if (self::getPdo()->exec($sql) === false) {
                throw new \Exception('Não conseguiu gravar o registro');
    
            }
        }
    }
    
    public function apagar($chave)
    {
        $chave = (integer) $chave;
    
        $nomeChave = static::getChave();
        
        $cadastro = static::$tabela;
    
        self::getPdo()->
        exec("DELETE FROM $cadastro WHERE $nomeChave=$chave");
    
    }
    
                    
}
