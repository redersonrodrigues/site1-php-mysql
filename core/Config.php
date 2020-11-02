<?php
session_start();
ob_start(); // limpar o buffer de redirecionamento

define('URL', 'http://localhost/site1-php/');
define('URLADM', 'http://localhost/site1-php/adm/');
define('CONTROLER', 'Home'); //define página inicial
define('METODO', 'index');


// CREDENCIAIS DE ACESSO AO BANCO DE DADOS ABAIXO
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'ramar');
