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
<<<<<<< HEAD
        
        $listar_ser = new \Site\models\SiteServico();
        $this->Dados['sts_servicos'] = $listar_ser->listar();
        
        $listar_vid = new \Site\models\SiteVideo();
        $this->Dados['sts_videos'] = $listar_vid->listar();
=======
>>>>>>> 7a49bd5... Inserir botões e comentarios no carousel
        
        $carregarView = new \Core\ConfigView("/site/views/home/home", $this->Dados);
        $carregarView->renderizar();
    }
}
