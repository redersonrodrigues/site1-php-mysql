<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteArtProxAnt
{

    private $Resultado;
    private $IdArtigo;

    public function artigoProximo($IdArtigo = null)
    {
        $this->IdArtigo = (int) $IdArtigo;
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id AND id >:id
                ORDER BY id ASC 
                LIMIT :limit', "adms_sit_id=1&id={$this->IdArtigo}&limit=1");

        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

    public function artigoAnterior($IdArtigo = null)
    {
        $this->IdArtigo = (int) $IdArtigo;
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id AND id <:id
                ORDER BY id DESC 
                LIMIT :limit', "adms_sit_id=1&id={$this->IdArtigo}&limit=1");

        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
