<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SitePaginas
{
    private $Resultado;
    private $UrlController;
    
    public function listarPaginas($UrlController = null)
    {
        $this->UrlController = (string) $UrlController;
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT id FROM sts_paginas
                WHERE sts_situacaos_pg_id =:sts_situacaos_pg_id
                AND controller =:controller
                LIMIT :limit', "sts_situacaos_pg_id=1&controller={$this->UrlController}&limit=1");
        
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);
        return $this->Resultado;
    }
}
