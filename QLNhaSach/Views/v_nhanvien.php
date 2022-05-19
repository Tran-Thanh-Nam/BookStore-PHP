<?php
       include_once("./models/nhanvienclass.php");
?>
<div class="row">
    <h3>Danh Sách Nhân Viên</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma NV </td>
                <td> Ho Ten</td> 
                <td> Ngay Sinh</td> 
                <td> SDT </td>               
            </tr>          
        </thead>      
        <?php
            $nhanvien = new nhanvienclass();
            $arr = $nhanvien->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $nv = new nhanvienclass();
                    $kq = $nv->delete_nhanvien($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:nhanvien.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_nv']."</td>";
                echo "<td>".$item['ho_ten']."</td>";
                echo "<td>".$item['ngay_sinh']."</td>";
                echo "<td>".$item['sdt']."</td>";               
                echo "<td>";
                echo "<a class='btn btn-danger' href='editnhanvien.php?id=".$item['ma_nv']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='nhanvien.php?id=".$item['ma_nv']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_nhanvien.php"><input type="submit" value="Them nhan vien "/></a>
</div>
