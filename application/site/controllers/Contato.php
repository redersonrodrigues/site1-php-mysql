<?php
namespace Site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of Contato
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class Contato {
    
    private $Dados;

    public function index()
    {
        $this->Dados = ['nome' => 'Réderson', 'email' => 'r.ataliba@hotmail.com', 'assunto' => 'teste1', 'mensagem' => 'msg teste 1', 'created' => date('Y-m-d H:i:s')];
        //var_dump($this->Dados);
        $cadContato = new \Site\models\SiteContato();
        $cadContato->cadContato($this->Dados);
    }
}
?>