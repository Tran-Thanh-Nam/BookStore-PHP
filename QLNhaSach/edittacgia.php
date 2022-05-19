<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    </head>
    <?php
        require_once("models/tacgiaclass.php");
    ?>
    <body>
        <div class="container">
        
        <?php
            $ma =$_GET["id"];
            $tg = new tacgiaclass();
            $arr = $tg->select_tg($ma);
            if(isset($_POST["btnCapNhat"])){
                $ten =$_POST["tentg"];
                $website =$_POST["website"];
                $ghichu =$_POST["ghichu"];
                $tg = new tacgiaclass();
                $kq = $tg->edit_tacgia($ma,$ten,$website,$ghichu);
                if($kq) {
                    
                    header("Location:edittacgia.php?id=".$ma."&m=1");
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
        <form method="post" action="edittacgia.php?id=<?php echo $ma; ?>">
        <div class="form-group">
            <label>Ma tac gia </label>
            <input type="text" readonly value=<?php echo $arr[0][0]; ?> name="matacgia" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ten tac gia </label>
            <input type="text" value=<?php echo $arr[0][1]; ?> name="tentg" class="form-control"/>
        </div>    
        <div class="form-group">
            <label>Website </label>
            <input type="text" value=<?php echo $arr[0][2]; ?> name="website" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Ghi chu </label>
            <input type="text" value=<?php echo $arr[0][3]; ?> name="ghichu" class="form-control"/>
        </div>
        <div class="form-group">
            <button type="submit" name="btnCapNhat" class="btn btn-primary">Cap nhat</button>
        </div>
        <div class="form-group">
            <a href="tacgia.php">Quay ve</a>
            <input type="hidden" name="del" value="<?php echo $delete; ?>">
        </div>
        </form>
    </body>
</html>