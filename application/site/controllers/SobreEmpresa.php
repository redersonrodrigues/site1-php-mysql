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
        echo 'Página Sobre Empresa <br>';
    }
            
    
}
