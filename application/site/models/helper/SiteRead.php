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
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        echo "{$this->Select}";
        $this->exeInstrucao();
    }
    
    private function exeInstrucao() {
        
        $this->conexao();
        try {
            $this->getInstrucao();
            //var_dump($this->Query);
            $this->Query->execute();
            $this->Resultado = $this->Query->fetchAll();
            var_dump($this->Resultado);
        } catch (Exception $exc) {
            $this->Resultado = null;
            }  
    }
    
    public function fullRead($Query, $ParseString = null) {
        $this->Select = (string)$Query;
         if (!empty($ParseString)){
            parse_str($ParseString, $this->Values);
        }
        $this->exeInstrucao();
    }
      
    private function conexao() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Select);
        $this->Query->setFetchMode(PDO::FETCH_ASSOC);
    }
    
    
    private function getInstrucao() {
        if ($this->Values){
            foreach ($this->Values as $Link => $Valor) {
                if ($Link == 'limit' || $Link == 'offset'){
                    $Valor = (int)$Valor;
                }
                $this->Query->bindValue(":{$Link}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
