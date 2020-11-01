<?php

namespace Site\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class SiteContato
{
    private $Resultado;
    private $Dados;


    public function cadContato(array $Dados)
    {
        $this->Dados = $Dados;
        $cadContato = new \Site\models\helper\SiteCreate();
        $cadContato->exeCreate('sts_contatos', $this->Dados);
        if($cadContato->getResultado()){
            $_SESSION['msg'] = "<div class='alert alert-success'>Mensagem enviada com sucesso!</div>";
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Mensagem não foi enviada!</div>";
        }
    }
}
