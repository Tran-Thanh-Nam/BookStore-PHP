<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/nxbclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $manxb = $_POST["manxb"];
                $tennxb =$_POST["tennxb"];
                $diachi =$_POST["diachi"];
                $email =$_POST["email"];
                $nxb = new nxbclass();
                $kq = $nxb->add_new_nxb($manxb, $tennxb, $diachi, $email);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_nxb.php?m=1");
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
        <form method="post" action="v_new_nxb.php">
        <div class="form-group">
            <label>Ma NXB </label>
            <input type="text" name="manxb" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten NXB </label>
            <input type="text" name="tennxb" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Dia Chi </label>
            <input type="text" name="diachi" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label> </label>
            <input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">
            <a href="../nxb.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>