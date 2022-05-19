<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/sachclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $masach = $_POST["masach"];
                $tensach =$_POST["tensach"];
                $matacgia =$_POST["matacgia"];
                $matheloai =$_POST["matheloai"];
                $manxb =$_POST["manxb"];
                $namxuatban =$_POST["namxuatban"];
                $gia =$_POST["gia"];
                $tinhtrang =$_POST["tinhtrang"];
                $hinhanh =$_POST["hinhanh"];
                $s = new sachclass();
                $kq = $s->add_new_sach($masach,$tensach,$matacgia,$matheloai,$manxb,$namxuatban,$gia,$tinhtrang,$hinhanh);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_sach.php?m=1");
                }
            }

            

            if(isset($_GET["m"])) {
                if($_GET["m"] == 1) {
                    echo 'Thanh cong';
                } else {
                    echo 'That bai!';
                }
            }

            
        
        ?>
        <form method="post" action="v_new_sach.php">
        <div class="form-group">
            <label>Ma sach </label>
            <input type="text" name="masach" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten sach </label>
            <input type="text" name="tensach" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ma tac gia </label>
            <input type="text" name="matacgia" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Ma the loai </label>
            <input type="text" name="matheloai" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Ma NXB </label>
            <input type="text" name="manxb" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Nam XB</label>
            <input type="text" name="namxuatban" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Gia </label>
            <input type="text" name="gia" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Tinh trang </label>
            <input type="text" name="tinhtrang" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Hinh anh </label>
            <input type="text" name="hinhanh" class="form-control"/>
        </div>


        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">    
            <a href="../sach.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>