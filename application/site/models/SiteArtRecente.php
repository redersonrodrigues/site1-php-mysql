<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteArtRecente
{

    private $Resultado;

    public function listarArtRecente()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT titulo, slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit', "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);
        return $this->Resultado;
    }

}
