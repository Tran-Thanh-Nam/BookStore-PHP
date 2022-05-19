<?php
class DB{
    //ket noi void db
    private function __construct(){}
    public static $mDB = NULL;
    public static $mDBi = NULL;
    public static function getDB(){
        if (!isset(self::$mDB)){
            self::$mDB = new PDO('mysql:host=localhost;dbname=qlns;charset=utf8','root', '');
        }
        return self::$mDB;
    }

    public static function getDBSQLi()
    {
        if (!isset(self::$mDBi)){
            self::$mDBi = new mysqli(' localhost','root', '', 'qlns');
            self::$mDBi->set_charset("utf8");
        }
        return self::$mDBi;
    }

    
}
?>