<?php
namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of SobreEmpresa
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class SobreEmpresa {

    public function index() {
       //echo 'Página Sobre Empresa <br>';
         $listarSobEmp = new \Site\models\SiteSobEmp();
        $this->Dados['sts_sobs_emps'] = $listarSobEmp->listarSobEmp();
        
        $carregarView = new \Core\ConfigView('site/views/sobEmp/sobEmp', $this->Dados);
        $carregarView->renderizar();
    }
            
    
}
