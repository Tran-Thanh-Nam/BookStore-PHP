<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/nhanvienclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $nv = new nhanvienclass();
            $arr = $nv->select_nv($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["hoten"];
                $ngaysinh =$_POST["ngaysinh"];
                $sdt =$_POST["sdt"];               
                $nv = new nhanvienclass();
                $kq = $nv->edit_nhanvien($ma,$ten,$ngaysinh,$sdt);
                if($kq) {
                    
                    header("Location:editnhanvien.php?id=".$ma."&m=1");
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
        <form method="post" action="editnhanvien.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma nhan vien </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="manv" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten nhan vien </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="hoten" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Ngay sinh </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="ngaysinh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>So dien thoai </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="sdt" class="form-control"/>
        </div>

        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="nhanvien.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>