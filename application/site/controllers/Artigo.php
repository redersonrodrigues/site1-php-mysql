<?php

namespace App\site\controllers;

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
        
        $listarMenu = new \Site\models\SiteMenu();
        $this->Dados['menu'] = $listarMenu->listarMenu();
        
        $visualizarArt = new \Site\models\SiteArtigo();
        $this->Dados['sts_artigos'] = $visualizarArt->visualizarArtigo($this->Artigo);

        $listarArtRecente = new \Site\models\SiteArtRecente();
        $this->Dados['artRecente'] = $listarArtRecente->listarArtRecente();

        $listarArtDestaque = new \Site\models\SiteArtDestaque();
        $this->Dados['artDestaque'] = $listarArtDestaque->listarArtDestaque();

        $visSobreAutor = new \Site\models\SiteSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();

        $listarSeo = new \Site\models\SiteSeo();
        $this->Dados['seo'] = $listarSeo->listarSeo();
        
        if (!empty($this->Dados['sts_artigos'][0])) {
            $artProxAnt = new \Site\models\SiteArtProxAnt();
            $this->Dados['artProximo'] = $artProxAnt->artigoProximo($this->Dados['sts_artigos'][0]['id']);
            $this->Dados['artAnterior'] = $artProxAnt->artigoAnterior($this->Dados['sts_artigos'][0]['id']);
            $this->Dados['seo'] = $listarSeo->listarSeo('sts_artigos', 'slug', $this->Artigo);
        } else {
            $this->Dados['seo'] = $listarSeo->listarSeo();
        }

        $carregarView = new \Core\ConfigView('site/views/blog/artigo', $this->Dados);
        $carregarView->renderizar();
    }

}
