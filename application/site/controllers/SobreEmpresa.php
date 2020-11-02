<?php

namespace App\site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SobreEmpresa
{

    private $Dados;

    public function index()
    {
        $listarSobEmp = new \Site\models\SiteSobEmp();
        $this->Dados['sts_sobs_emps'] = $listarSobEmp->listarSobEmp();
        
        $carregarView = new \Core\ConfigView('site/views/sobEmp/sobEmp', $this->Dados);
        $carregarView->renderizar();
    }

}
