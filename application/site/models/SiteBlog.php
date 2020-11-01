<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteBlog
{
    private $Resultado;
    
    public function ListarArtigos()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit', 'adms_sit_id=1&limit=5');
        $this->Resultado = $listar->getResultado();
        
        return $this->Resultado;
    }
}
