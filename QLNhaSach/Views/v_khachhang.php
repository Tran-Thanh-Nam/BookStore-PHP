<?php
       include_once("./models/khachhangclass.php");
?>
<div class="row">
    <h3>Danh Sách Người dùng</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> MaKH </td>
                <td> TenKH</td> 
                <td> DiaChi</td> 
                <td> SDT </td>
                <td> Username </td>
                <td> PassWord </td>
                <td> Quyen </td>
                
            </tr>          
        </thead>      
        <?php
            $khachhang = new khachhangclass();
            $arr = $khachhang->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $lsp = new khachhangclass();
                    $kq = $lsp->delete_khachhang($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:index.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_kh']."</td>";
                echo "<td>".$item['ten_kh']."</td>";
                echo "<td>".$item['dia_chi']."</td>";
                echo "<td>".$item['sdt']."</td>";
                echo "<td>".$item['username']."</td>";
                echo "<td>".$item['password']."</td>";
                echo "<td>".$item['quyen']."</td>";
                echo "<td>";
                echo "<a class='btn btn-danger' href='editkhachhang.php?id=".$item['ma_kh']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='index.php?id=".$item['ma_kh']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_khachhang.php"><input type="submit" value="Them nguoi dung"/></a>
</div>
