<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/nxbclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $nxb = new nxbclass();
            $arr = $nxb->select_nxb($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tennxb"];
                $diachi =$_POST["diachi"];
                $email =$_POST["email"];
                $nxb = new nxbclass();
                $kq = $nxb->edit_nxb($ma,$ten,$diachi,$email);
                if($kq) {
                    
                    header("Location:editnxb.php?id=".$ma."&m=1");
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
        <form method="post" action="editnxb.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma NXB </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="manxb" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten NXB </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tennxb" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Dia chi </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="diachi" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="nxb.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>