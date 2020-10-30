<?php

namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of Home
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Home {
    
    private $Dados;
    
    public function index() {
        //echo 'Página HOME (inicial) <br>';
        $listar_car = new \Site\models\SiteCarousel();
        $this->Dados['sts_carousels'] = $listar_car->listar();

        
        $listar_ser = new \Site\models\SiteServico();
        $this->Dados['sts_servicos'] = $listar_ser->listar();
        
        $listar_vid = new \Site\models\SiteVideo();
        $this->Dados['sts_videos'] = $listar_vid->listar();
                
        $listar_artigo = new \Site\models\SiteArtigoHome();
        $this->Dados['sts_artigos'] = $listar_artigo->listarArtHome();
        
        $listar_ser = new \Site\models\SiteServico();
        $this->Dados['sts_servicos'] = $listar_ser->listar();
        
        $carregarView = new \Core\ConfigView("/site/views/home/home", $this->Dados);
        $carregarView->renderizar();
    }
}
