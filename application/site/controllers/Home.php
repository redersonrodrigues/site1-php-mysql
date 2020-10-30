<?php

namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of Home
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Home {
    
    private $Dados;
    
    public function index() {
        //echo 'Página HOME (inicial) <br>';
        $home = new \Site\models\SiteHome();
        $this->Dados = $home->index();
        
        $carregarView = new \Core\ConfigView("/site/views/home/home", $this->Dados);
        $carregarView->renderizar();
    }
}
