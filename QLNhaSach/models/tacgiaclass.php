<?php
    require_once("db.php");
    class tacgiaclass{
        private $dbconnect ;
        public function __construct(){}
        public function select_all()
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from tacgia";
                $kq = $dbconnect->query($select);// goi query cho cau 
                $arr = $kq->fetchAll();
                $dbconnect=null; //dong connection lai
                return $arr;
            }
            catch( PDOException $ex){
                return array();
            }
        }

        public function add_new_tacgia($matacgia, $tentg, $website, $ghichu)
        {
            try{
                $dbconnect = DB::getDB();
                $insert ="INSERT INTO tacgia(ma_tac_gia, ten_tac_gia, website, ghichu) VALUES (:matacgia, :tentg, :website, :ghichu)";
                $stmt= $dbconnect->prepare($insert);            
                $stmt->bindParam(":matacgia", $matacgia);
                $stmt->bindParam(":tentg", $tentg);  
                $stmt->bindParam(":website", $website);  
                $stmt->bindParam(":ghichu", $ghichu);  

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

        public function get_One_tacgia($matacgia) {
            try{
                $dbconnect = DB::getDB();
                $select ="SELECT * FROM tacgia tg, sach s WHERE tl.matacgia = s.matacgia and matacgia=:matacgia";
                $stmt= $dbconnect->prepare($select);
                $stmt->bindParam(":matacgia", $matacgia);
                $kq = $stmt->execute();
                $arr = $stmt->fetchAll();
                $dbconnect=null;
                return $arr;
            }
            catch(PDOException $ex){
                return array();
            }
        }


        public function update_One_tacgia($matacgia) {
            try{
                $dbconnect = DB::getDB();
                $update ="UPDATE tacgia";
                $stmt= $dbconnect->prepare($update);
                $stmt->bindParam(":matacgia", $matacgia);
                $result = $stmt->execute();
                $dbconnect=null;
                return $result;
            }
            catch(PDOException $ex){
                return 0;
            }
        }


        // su dung preparedstatemet - ham co tham so
        public function edit_tacgia($matacgia, $tentg, $website, $ghichu){
            try{
                $dbconnect = DB::GetDB();
                $update = "UPDATE tacgia SET ten_tac_gia =:ten, website =:website, ghichu =:ghichu
                            WHERE ma_tac_gia =:ma   ";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ten",$tentg);
                $stmt->bindParam(":website",$website);
                $stmt->bindParam(":ghichu",$ghichu);
                $stmt->bindParam(":ma",$matacgia);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function delete_tacgia($matacgia){
            try{
                $dbconnect = DB::GetDB();
                $update = "DELETE FROM tacgia WHERE ma_tac_gia=:ma";
                $stmt = $dbconnect->prepare($update);
                //gan gia tri cua bien vao cac tham so
                $stmt->bindParam(":ma",$matacgia);

                $kq = $stmt->execute(); // thuc thi cau truy van
                $dbconnect=null; // dong ket noi
                return $kq; // tra ve dong da update
            }   
            catch( PDOException $ex){
                return 0;   
            }
        }

        public function select_tg($ma)
        {
            try{
                $dbconnect = DB::GetDB();// GetDB la ham static trong
                $select = "select * from tacgia where ma_tac_gia=".$ma;
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