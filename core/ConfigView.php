<?php
namespace Core;
/**
 * Description of ConfigView
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class ConfigView {

    private $Nome;
    private $Dados;
    
    public function __construct($Nome, array $Dados = null) {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
        //echo "Carregar a View <br>";
    }
    
    public    function renderizar() {
        if (file_exists('application/' . $this->Nome . '.php')){
            include 'application/site/views/include/cabecalho.php';
            include 'application/site/views/include/rodape.php';
            include 'application/' . $this->Nome . '.php';  
        } else {
            echo "Erro ao carregar a View: Página: ($this->Nome)";
        }
        
       
    }
    
    }
