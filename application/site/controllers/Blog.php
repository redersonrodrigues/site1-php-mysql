<?php
namespace Site\controllers;
if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of Blog
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Blog {

    public function index() {
        echo 'Página Blog <br>';
    }
    
    }
