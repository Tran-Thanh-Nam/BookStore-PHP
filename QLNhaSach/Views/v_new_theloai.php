<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/loaisachclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $maloai = $_POST["maloai"];
                $ten =$_POST["tenloai"];
                $lsp = new loaisachclass();
                $kq = $lsp->add_new_theloai($maloai,$ten);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_theloai.php?m=1");
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
        <form method="post" action="v_new_theloai.php">
        <div class="form-group">
            <label>Ma loai sp </label>
            <input type="text" name="maloai" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten loai sp </label>
            <input type="text" name="tenloai" class="form-control"/>
        </div>    
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="../theloai.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>