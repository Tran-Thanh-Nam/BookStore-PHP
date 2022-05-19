<?php
include_once("models/db.php");
class Users{
    private $dbconnect;
    public function __cosntruct(){

    }
    public function login($username,$pass){
        try{
            $dbconnect=DB::getDB();
            $select="SELECT * FROM khachhang
                     WHERE  username=:username and password=:pass";
            $stmt =$dbconnect->prepare($select);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":pass",$pass);
            $stmt->execute();
            $kq=$stmt->fetchAll();
            //echo $select;
            //var_dump($stmt);
            $dbconnect=null;
            return $kq;


        }
        catch(PDOException $ex){
           // return array();
          // echo $ex;
        }
    }
}
?>