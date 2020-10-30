<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteVideo
{
    private $Resultado;
    
    public function listar()
    {
        $listar_video = new \Site\models\helper\SiteRead();
        $listar_video->exeRead('sts_videos', 'LIMIT :limit', 'limit=1');
        $this->Resultado = $listar_video->getResultado();
        return $this->Resultado;
    }
}
