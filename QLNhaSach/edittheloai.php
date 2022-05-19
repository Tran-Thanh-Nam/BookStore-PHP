<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/loaisachclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $lsp = new loaisachclass();
            $arr = $lsp->select_sp($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tenloai"];
                $lsp = new loaisachclass();
                $kq = $lsp->edit_loaisp($ma,$ten);
                if($kq) {
                    
                    header("Location:edittheloai.php?id=".$ma."&m=1");
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
        <form method="post" action="edittheloai.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma loai sp </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="maloai" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten loai sp </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tenloai" class="form-control"/>
        </div>    
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="theloai.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>