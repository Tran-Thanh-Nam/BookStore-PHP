<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/nhanvienclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $manv = $_POST["manv"];
                $hoten =$_POST["hoten"];
                $ngaysinh =$_POST["ngaysinh"];
                $sdt =$_POST["sdt"];               
                $nv = new nhanvienclass();
                $kq = $nv->add_new_nhanvien($manv,$hoten,$ngaysinh,$sdt);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_nhanvien.php?m=1");
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
        <form method="post" action="v_new_nhanvien.php">
        <div class="form-group">
            <label>Ma nhan vien </label>
            <input type="text" name="manv" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten nhan vien </label>
            <input type="text" name="hoten" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ngay sinh </label>
            <input type="text" name="ngaysinh" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>So dien thoai </label>
            <input type="text" name="sdt" class="form-control"/>
        </div>        


        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">them</button>
        </div>
        <div class="form-group">    
            <a href="../nhanvien.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>