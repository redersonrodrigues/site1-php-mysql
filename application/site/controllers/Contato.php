<?php

namespace App\site\controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Contato
{

    private $Dados;

    public function index()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['CadMsgCont'])) {
            unset($this->Dados['CadMsgCont']);
            $cadContato = new \Site\models\SiteContato();
            $cadContato->cadContato($this->Dados);
            if ($cadContato->getResultado()) {
                $this->Dados['form'] = null;
            } else {
                $this->Dados['form'] = $this->Dados;
            }            
        }
        $carregarView = new \Core\ConfigView('site/views/contato/contato', $this->Dados);
        $carregarView->renderizar();
    }

}
