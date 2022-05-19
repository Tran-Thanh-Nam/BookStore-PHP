<?php
    require_once("db.php");
    class sachclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from sach";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_sach($masach,$tensach,$matacgia,$matheloai,$manxb,$namxuatban,$gia,$tinhtrang,$hinhanh)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO sach(ma_sach, ten_sach, ma_tac_gia, ma_the_loai, ma_nxb, nam_xb, gia, tinhtrang, hinhanh ) 
                            VALUES (:masach, :tensach, :matacgia, :matheloai, :manxb, :namxuatban, :gia, :tinhtrang, :hinhanh)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":masach", $masach);
                $stmt->bindParam(":tensach", $tensach);
                $stmt->bindParam(":matacgia", $matacgia);
                $stmt->bindParam(":matheloai", $matheloai);
                $stmt->bindParam(":manxb", $manxb);
                $stmt->bindParam(":namxuatban", $namxuatban);    
                $stmt->bindParam(":gia", $gia);   
                $stmt->bindParam(":tinhtrang", $tinhtrang);
                $stmt->bindParam(":hinhanh", $hinhanh);

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

        public function get_One_sach($masach) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM sach s WHERE masach=:masach";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":masach", $masach);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_sach($masach) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE sach";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":masach", $masach);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_sach($masach,$tensach,$matacgia,$matheloai,$manxb,$namxuatban,$gia,$tinhtrang,$hinhanh){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE sach SET ten_sach=:ten, ma_tac_gia=:matg, ma_the_loai=:matl, ma_nxb=:nxb, nam_xb=:nam, gia=:price, tinhtrang=:ttrang, hinhanh=:anh
                            WHERE ma_sach =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$tensach);               
                $stmt->bindParam(":matg",$matacgia);
                $stmt->bindParam(":matl",$matheloai);
                $stmt->bindParam(":nxb",$manxb);
                $stmt->bindParam(":nam",$namxuatban);
                $stmt->bindParam(":price",$gia);
                $stmt->bindParam(":ttrang",$tinhtrang);
                $stmt->bindParam(":anh",$hinhanh);
                $stmt->bindParam(":ma",$masach);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_sach($masach){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM sach WHERE ma_sach=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$masach);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_sach($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from sach where ma_sach=".$ma;
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