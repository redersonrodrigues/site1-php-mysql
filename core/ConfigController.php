<?php

namespace Core;
/**
 * Description of ConfigController
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class ConfigController {
    private $Url;
    private $UrlComposta;
    private $UrlController;
    private $UrlParametro;
    private static $Format;


// criando um construtor
    public function __construct() {
        
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)))  {      
            //echo "SITE";
            //capturar url escrita na frente do nome do arquivo rais index.php
            //como por exemplo index.php/blog, vai retornar blog
            $this->Url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //chamar metodo para tratar url (limparUrl)
            $this->limparUrl();
            
            //separar pela barra a primeira posição e a segunda
            $this->UrlComposta = explode("/", $this->Url);
            // a partir da primeira posição faço uma verificação
                if(isset($this->UrlComposta[0])){
                    $this->UrlController = $this->slugController($this->UrlComposta[0]);

                }
                else {

                    $this->UrlController = CONTROLLER;

                }
            // recuperando a segunda posição da url amigavel verifico
                if(isset($this->UrlComposta[1])){
                    $this->UrlParametro = $this->UrlComposta[1];
                }
                else {

                    $this->UrlParametro = null;

                }
            
            echo "URL: {$this->Url}<br>";
            echo "Controlle: {$this->UrlController} <br>";

            
            }
            else
            {
                $this->UrlController = CONTROLLER;
                $this->UrlParametro = null;
            }

        }
        
        
        // metodo para tratar url amigavel
        private function limparUrl(){
            // Eliminar tags
            $this->Url = strip_tags($this->Url);
            // Eliminar espaços em branco
            $this->Url = trim($this->Url);
            // Eliminar a barra no final da url
            $this->Url = rtrim($this->Url, "/");
            
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->Url = strtr(utf8_decode($this->Url), utf8_decode(self::$Format['a']), self::$Format['b']);

        }
        // função para converter a primeira letra conforme a classe na url composta
        //Exemplo: blog/artigo-um -> muda para Blog/artigo-um
        public function slugController($SlugController)
    {
        //$UrlController = strtolower($SlugController);
        //$UrlController = explode("-", $UrlController);
        //$UrlController = implode(" ", $UrlController);
        //$UrlController = ucwords($UrlController);
        //$UrlController = str_replace(" ", "", $UrlController);
        $UrlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugController)))));
        return $UrlController;
    }
    
    
    public function carregarPagina(){
       
        $classe = "\\Site\\controllers\\" . $this->UrlController;
        $classeCarregar = new $classe;
        $classeCarregar->index();
        
    }

        
        
}
