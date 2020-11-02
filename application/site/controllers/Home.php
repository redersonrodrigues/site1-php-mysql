<?php

namespace App\site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Home
{

    private $Dados;

    public function index()
    {
        $listar_car = new \Site\models\SiteCarousel();
        $this->Dados['sts_carousels'] = $listar_car->listar();

        $listar_ser = new \Site\models\SiteServico();
        $this->Dados['sts_servicos'] = $listar_ser->listar();

        $listar_vid = new \Site\models\SiteVideo();
        $this->Dados['sts_videos'] = $listar_vid->listar();
        
        $listar_art_home = new \Site\models\SiteArtigoHome();
        $this->Dados['sts_artigos']= $listar_art_home->listarArtHome();

        $carregarView = new \Core\ConfigView("site/views/home/home", $this->Dados);
        $carregarView->renderizar();
    }

}
