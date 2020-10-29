<?php
namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of Contato
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Contato {
    
    public function index() {
        echo 'Página Contato <br>';
    }
}
?>