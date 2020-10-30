<?php
namespace Site\models\helper;
use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}
/**
 * Description of SiteConn
 *
 * @copyright (c) year, Réderson Rodrigues - RAMAR
 * */
class SiteConn {

    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $Dbname = DBNAME;
    private static $Connect = null;
    
    private static function conectar() {
        try {
            if (self::$Connect == null){
            self::$Connect = new \PDO('mysql:host='.self::$Host. ';dbname='.self::$Dbname, self::$User, self::$Pass);
            }
        } catch (Exception $exc) {
            echo 'mensagem: ' . $exc->getMessage();
            die;
        }
        return self::$Connect;
        }
    
    public function getConn() {
        return self::conectar();
    }
}
