<?php
namespace Site\models\helper;
use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of SiteRead
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class SiteRead extends SiteConn{

    private $Select;
    private $Values;
    private $Resultado;
    private $Query;
    private $Conn;
    
    function getResultado() {
        return $this->Resultado;
    }

    public function exeRead($Tabela, $Termos = null, $ParseString = null) {
        if (!empty($ParseString)){
            parse_str($ParseString, $this->Values);
        }
        $this->Select = "SELECT * FROM ($Tabela) ($Termos)";
        echo "{$this->Select}";
        $this->exeInstrucao();
    }
    
    private function exeInstrucao() {
        
        $this->conexao();
        
        
    }
      
    private function conexao() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Select);
        $this->Query->setFetchMode(PDO::FETCH_ASSOC);
    }
}
