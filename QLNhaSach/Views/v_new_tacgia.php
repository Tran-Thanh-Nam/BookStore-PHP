<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
    </head>
    <?php
        require_once("../models/tacgiaclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php

            if(isset($_POST["btnCapNhat"])){
                $matacgia = $_POST["matacgia"];
                $tentg =$_POST["tentg"];
                $website =$_POST["website"];
                $ghichu =$_POST["ghichu"];
                $tg = new tacgiaclass();
                $kq = $tg->add_new_tacgia($matacgia, $tentg, $website, $ghichu);
                var_dump($kq);
                if($kq) {
                    
                    header("Location:v_new_tacgia.php?m=1");
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
        <form method="post" action="v_new_tacgia.php">
        <div class="form-group">
            <label>Ma tac gia </label>
            <input type="text" name="matacgia" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten tac gia </label>
            <input type="text" name="tentg" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Website </label>
            <input type="text" name="website" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ghi chu</label> </label>
            <input type="text" name="ghichu" class="form-control"/>
        </div>
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Thêm mới</button>
        </div>
        <div class="form-group">
            <a href="../tacgia.php">Quay ve</a>
        </div>
        </form>
    </body>
</html>