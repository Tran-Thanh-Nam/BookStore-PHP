<?php
    require_once("db.php");
    class nhanvienclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nhanvien";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_nhanvien($manv,$hoten,$ngaysinh,$sdt)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO nhanvien(ma_nv, ho_ten, ngay_sinh, sdt ) VALUES (:manv, :hoten, :ngaysinh, :sdt)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":manv", $manv);
                $stmt->bindParam(":hoten", $hoten);
                $stmt->bindParam(":ngaysinh", $ngaysinh);
                $stmt->bindParam(":sdt", $sdt);                                     
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

        public function get_One_nhanvien($manv) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM nhanvien nv WHERE manv=:manv";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":manv", $manv);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_nhanvien($manv) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE nhanvien";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":manv", $manv);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_nhanvien($manv,$hoten,$ngaysinh,$sdt){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE nhanvien SET ho_ten =:ten, ngay_sinh =:ns, sdt =:dt
                            WHERE ma_nv =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so               
                $stmt->bindParam(":ten",$hoten);               
                $stmt->bindParam(":ns",$ngaysinh);
                $stmt->bindParam(":dt",$sdt);               
                $stmt->bindParam(":ma",$manv);               
                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch(PDOException $ex){
                return 0;   
            }
        }

        public function delete_nhanvien($manv){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM nhanvien WHERE ma_nv=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$manv);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_nv($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from nhanvien where ma_nv=".$ma;
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