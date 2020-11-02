<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteSobEmp
{
    private $Resultado;
    
    public function listarSobEmp()
    {
        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobs_emps
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY ordem ASC', 'adms_sit_id=1');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
