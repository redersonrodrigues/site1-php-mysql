<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteMenu
{
    private $Resultado;
    
    public function listarMenu()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT endereco, nome_pagina 
                FROM sts_paginas
                WHERE lib_bloq =:lib_bloq 
                AND sts_situacaos_pg_id =:sts_situacaos_pg_id
                ORDER BY ordem ASC', "lib_bloq=1&sts_situacaos_pg_id=1");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
