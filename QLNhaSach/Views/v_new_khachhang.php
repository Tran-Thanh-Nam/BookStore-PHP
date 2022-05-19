<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/khachhangclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $makh = $_POST["makh"];
                $tenkh =$_POST["tenkh"];
                $diachi =$_POST["diachi"];
                $sdt =$_POST["sdt"];
                $username =$_POST["username"];
                $password =$_POST["password"];
                
                $quyen =$_POST["quyen"];
                $kh = new khachhangclass();
                $kq = $kh->add_new_khachhang($makh,$tenkh,$sdt,$diachi,$username,$password,$quyen);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_khachhang.php?m=1");
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
        <form method="post" action="v_new_khachhang.php">
        <div class="form-group">
            <label>Ma khach hang </label>
            <input type="text" name="makh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten khach hang </label>
            <input type="text" name="tenkh" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Dia chi </label>
            <input type="text" name="diachi" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>So dien thoai </label>
            <input type="text" name="sdt" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>UserName </label>
            <input type="text" name="username" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>PassWord</label>
            <input type="text" name="password" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Quyen </label>
            <input type="text" name="quyen" class="form-control"/>
        </div> 


        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">    
            <a href="../index.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>