<?php
namespace App\lojas\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of Blog
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Loja {
    
    private $Dados;
    private $PageId;
    
    public function index() {
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;
        //echo "<br><br><br> {$this->PageId}";
        
        $listarMenu = new \Site\models\SiteMenu();
        $this->Dados['menu'] = $listarMenu->listarMenu();
        
        $listarSeo = new \Site\models\SiteSeo();
        $this->Dados['seo'] = $listarSeo->listarSeo();
        
        $listar_art = new \Site\models\SiteBlog();
        $this->Dados['artigos'] = $listar_art->listarArtigos($this->PageId);
        $this->Dados['paginacao'] = $listar_art->getResultadoPg();
        
        $listarArtRecente = new \Site\models\SiteArtRecente();
        $this->Dados['artRecente'] =$listarArtRecente->listarArtRecente();

        $listarArtDestaque = new \Site\models\SiteArtDestaque();
        $this->Dados['artDestaque']= $listarArtDestaque->listarArtDestaque();
        
        $visSobreAutor = new \Site\models\SiteSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();

        $carregarView = new \Core\ConfigView('lojas/views/loja/vitrine', $this->Dados);
        $carregarView->renderizar();   
        }
    
    }
