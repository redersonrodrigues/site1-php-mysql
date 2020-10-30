<?php
namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of SiteHome
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class SiteHome {
    public function index() {
        echo "Listar Dados <br>";
        $conexao = new \Site\models\helper\SiteConn();
        $conexao->getConn();
    }
}
