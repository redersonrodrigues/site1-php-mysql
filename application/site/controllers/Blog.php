<?php
namespace Site\controllers;
if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of Blog
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Blog {

    public function index() {
        $listar_art = new \Site\models\SiteBlog();
        $this->Dados['artigos'] = $listar_art->ListarArtigos();

        $carregarView = new \Core\ConfigView('site/views/blog/blog', $this->Dados);
        $carregarView->renderizar();   
        }
    
    }
