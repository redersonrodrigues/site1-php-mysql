<?php

namespace App\site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Blog
{

    private $Dados;
    private $PageId;

    public function index()
    {
        $listarMenu = new \Site\models\SiteMenu();
        $this->Dados['menu'] = $listarMenu->listarMenu();
         
        $listarSeo = new \Site\models\SiteSeo();
        $this->Dados['seo'] = $listarSeo->listarSeo();
        
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;
        //echo "<br><br><br> {$this->PageId}";
        $listar_art = new \Site\models\SiteBlog();
        $this->Dados['artigos'] = $listar_art->listarArtigos($this->PageId);
        $this->Dados['paginacao'] = $listar_art->getResultadoPg();

        $listarArtRecente = new \Site\models\SiteArtRecente();
        $this->Dados['artRecente'] = $listarArtRecente->listarArtRecente();

        $listarArtDestaque = new \Site\models\SiteArtDestaque();
        $this->Dados['artDestaque'] = $listarArtDestaque->listarArtDestaque();

        $visSobreAutor = new \Site\models\SiteSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();

        $carregarView = new \Core\ConfigView('site/views/blog/blog', $this->Dados);
        $carregarView->renderizar();
    }

}
