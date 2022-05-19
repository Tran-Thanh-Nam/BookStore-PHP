<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/khachhangclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $kh = new khachhangclass();
            $arr = $kh->select_kh($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tenkh"];
                $diachi =$_POST["diachi"];
                $sdt =$_POST["sdt"];
                $username =$_POST["username"];
                $password =$_POST["password"];
                $quyen =$_POST["quyen"];
                $kh = new khachhangclass();
                $kq = $kh->edit_khachhang($ma,$ten,$sdt,$diachi,$username,$password,$quyen);
                if($kq) {
                    
                    header("Location:editkhachhang.php?id=".$ma."&m=1");
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
        <form method="post" action="editkhachhang.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma khach hang </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="makh" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten khach hang </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tenkh" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Dia chi </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="diachi" class="form-control"/>
        </div>
        <div class="form-group">
            <label>So dien thoai </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="sdt" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Username </label>
            <input type="text" value=<?php echo $arr[0][4]; ?> name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label>PassWord </label>
            <input type="text" value=<?php echo $arr[0][5]; ?> name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Quyen </label>
            <input type="text" value=<?php echo $arr[0][6]; ?> name="quyen" class="form-control"/>
        </div>





        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="index.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>