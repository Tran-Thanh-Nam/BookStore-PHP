<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/sachclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $s = new sachclass();
            $arr = $s->select_sach($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tensach"];
                $matacgia =$_POST["matacgia"];
                $matheloai =$_POST["matheloai"];
                $manxb =$_POST["manxb"];
                $namxuatban =$_POST["namxuatban"];
                $gia =$_POST["gia"];
                $tinhtrang =$_POST["tinhtrang"];
                $hinhanh =$_POST["hinhanh"];
                $s = new sachclass();
                $kq = $s->edit_sach($ma,$ten,$matacgia,$matheloai,$manxb,$namxuatban,$gia,$tinhtrang,$hinhanh);
                if($kq) {
                    
                    header("Location:editsach.php?id=".$ma."&m=1");
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
        <form method="post" action="editsach.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma sach </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="masach" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten sach </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tensach" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ma tac gia </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="matacgia" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ma the loai </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="matheloai" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ma NXB </label>
            <input type="text" value=<?php echo $arr[0][4]; ?> name="manxb" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nam Xuat Ban </label>
            <input type="text" value=<?php echo $arr[0][5]; ?> name="namxuatban" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Gia </label>
            <input type="text" value=<?php echo $arr[0][6]; ?> name="gia" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tinh trang </label>
            <input type="text" value=<?php echo $arr[0][7]; ?> name="tinhtrang" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Hinh anh </label>
            <input type="text" value=<?php echo $arr[0][8]; ?> name="hinhanh" class="form-control"/>
        </div>





        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="sach.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>