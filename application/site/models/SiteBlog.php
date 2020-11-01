<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteBlog
{

    private $Resultado;
    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 2;

    function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

    public function listarArtigos($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \Site\models\helper\SitePaginacao(URL . 'blog');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao('SELECT COUNT(id) AS num_result
                FROM sts_artigos
                WHERE adms_sit_id =:adms_sit_id', 'adms_sit_id=1');
        $this->ResultadoPg = $paginacao->getResultado();

        $listar = new \Site\models\helper\SiteRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug FROM sts_artigos 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit OFFSET :offset', "adms_sit_id=1&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
