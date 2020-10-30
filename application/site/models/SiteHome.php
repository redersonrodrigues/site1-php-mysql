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
        //echo "Listar Dados <br>";
        //$conexao = new \Site\models\helper\SiteConn();
        //$conexao->getConn();
        $listar = new \Site\models\helper\SiteRead;
        $listar->exeRead('sts_carousels', 'WHERE adms_situacao_id = :adms_situacao_id LIMIT :limit', 'adms_situacao_id=1 & limit=4');
        
    }
}
