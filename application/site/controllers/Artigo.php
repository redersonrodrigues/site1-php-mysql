<?php

namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Artigo
{
    private $Dados;
    private $Artigo;

    public function index($Artigo = null)
    {
       
        $this->Artigo = (string) $Artigo;
        //echo "<br><br><br>{$this->Artigo}";

        $visualizarArt = new \Site\models\SiteArtigo();
        $this->Dados['sts_artigos'] = $visualizarArt->visualizarArtigo($this->Artigo);                

        $listarArtRecente = new \Site\models\SiteArtRecente();
        $this->Dados['artRecente'] = $listarArtRecente->listarArtRecente();

        $listarArtDestaque = new \Site\models\SiteArtDestaque();
        $this->Dados['artDestaque'] = $listarArtDestaque->listarArtDestaque();

        $visSobreAutor = new \Site\models\SiteSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();

        $carregarView = new \Core\ConfigView('site/views/blog/artigo', $this->Dados);
        $carregarView->renderizar();
    }

}
