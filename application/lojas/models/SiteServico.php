<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteServico
{
    private $Resultado;
    
    public function listar()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->exeRead('sts_servicos', 'LIMIT :limit', 'limit=1');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
