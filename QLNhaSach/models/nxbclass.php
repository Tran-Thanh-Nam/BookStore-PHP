<?php
    require_once("db.php");
    class nxbclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nxb";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_nxb($manxb, $tennxb, $diachi, $email)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO nxb(ma_nxb, ten_nxb, dia_chi, email) VALUES (:manxb, :tennxb, :diachi, :email)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":manxb", $manxb);
                $stmt->bindParam(":tennxb", $tennxb);  
                $stmt->bindParam(":diachi", $diachi);  
                $stmt->bindParam(":email", $email);  

                $result = $stmt->execute();
                $stmt->debugDumpParams();
                //var_dump($stmt);
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        public function get_One_nxb($manxb) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM nxb xb, sach s WHERE xb.manxb = s.manxb and manxb=:manxb";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":matacgia", $manxb);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_nxb($manxb) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE nxb";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":manxb", $manxb);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_nxb($manxb, $tennxb, $diachi, $email){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE nxb SET ten_nxb =:ten, dia_chi =:dc, email =:mail
                            WHERE ma_nxb =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ten",$tennxb);
                $stmt->bindParam(":dc",$diachi);
                $stmt->bindParam(":mail",$email);
                $stmt->bindParam(":ma",$manxb);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function delete_nxb($manxb){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM nxb WHERE ma_nxb=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$manxb);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_nxb($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nxb where ma_nxb=".$ma;
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }
        
    }


?>