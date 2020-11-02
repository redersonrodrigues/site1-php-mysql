<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteSobreAutor
{
    private $Resultado;
    
    public function sobreAutor()
    {
        $visSobreAutor = new \Site\models\helper\SiteRead();
        $visSobreAutor->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobres 
                WHERE adms_sit_id =:adms_sit_id 
                AND id =:id 
                LIMIT :limit', "adms_sit_id=1&id=1&limit=1");
        $this->Resultado = $visSobreAutor->getResultado();
        return $this->Resultado;
    }
}
