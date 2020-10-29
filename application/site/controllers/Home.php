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
    
    public function index() {
        //echo 'Página HOME (inicial) <br>';
        $carregarView = new \Core\ConfigView("/site/views/home/home");
        $carregarView->renderizar();
    }
}
