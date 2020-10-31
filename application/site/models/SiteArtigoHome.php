<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteArtigoHome
{

    private $Resultado;

    public function listarArtHome()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id 
                ORDER BY id DESC 
                LIMIT :limit', 'adms_sit_id=1&limit=3');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
