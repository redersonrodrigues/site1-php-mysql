<?php
namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of SiteHomeF
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class SiteHome {
    
    private $Resultado;


    public function index() {
        //echo "Listar Dados <br>";
        //$conexao = new \Site\models\helper\SiteConn();
        //$conexao->getConn();
        $listar = new \Site\models\helper\SiteRead();
       $listar->exeRead('sts_carousels', 'WHERE adms_situacao_id =:adms_situacao_id LIMIT :limit', 'adms_situacao_id=1&limit=4');
        //$listar->fullRead("SELECT nome, link FROM sts_carousels WHERE adms_situacao_id =:adms_situacao_id LIMIT :limit",  'adms_situacao_id=1&limit=4');
        $this->Resultado['sts_carousels'] = $listar->getResultado();
        return  $this->Resultado['sts_carousels'];
    }
}
