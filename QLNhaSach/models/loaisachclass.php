<?php
    require_once("db.php");
    class loaisachclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from theloai";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_theloai($maloai, $tenloai)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO theloai(ma_the_loai, ten_the_loai) VALUES (:maloai, :tenloai)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":maloai", $maloai);
                $stmt->bindParam(":tenloai", $tenloai);                               
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

        public function get_One_theloai($maloai) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM theloai tl, sach s WHERE tl.maloai = s.maloai and maloai=:maloai";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":maloai", $maloai);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_theloai($maloai) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE theloai";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":maloai", $maloai);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_loaisp($maloai, $tenloai){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE theloai SET ten_the_loai =:ten
                            WHERE ma_the_loai =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ten",$tenloai);
                $stmt->bindParam(":ma",$maloai);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function delete_loaisp($maloai){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM theloai WHERE ma_the_loai=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$maloai);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_sp($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from theloai where ma_the_loai=".$ma;
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