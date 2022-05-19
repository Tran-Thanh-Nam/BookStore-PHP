<?php
       include_once("./models/sachclass.php");
?>
<div class="row">
    <h3>Danh Mục Sách</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma Sach </td>
                <td> Ten Sach</td> 
                <td> Ma TacGia</td> 
                <td> Ma TheLoai</td> 
                <td> Ma NXB</td> 
                <td> Nam XB</td> 
                <td> Gia</td> 
                <td> Tinh Trang</td> 
                <td> Hinh Anh</td> 
                <td>#</td>                                        
            </tr>          
        </thead>      
        <?php
            $sach = new sachclass();
            $arr = $sach->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $s = new sachclass();
                    $kq = $s->delete_sach($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:sach.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_sach']."</td>";
                echo "<td>".$item['ten_sach']."</td>"; 
                echo "<td>".$item['ma_tac_gia']."</td>";
                echo "<td>".$item['ma_the_loai']."</td>";
                echo "<td>".$item['ma_nxb']."</td>";
                echo "<td>".$item['nam_xb']."</td>";
                echo "<td>".$item['gia']."</td>";
                echo "<td>".$item['tinhtrang']."</td>";
                echo "<td>".$item['hinhanh']."</td>";                          
                echo "<td>";
                echo "<a class='btn btn-danger' href='editsach.php?id=".$item['ma_sach']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='sach.php?id=".$item['ma_sach']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_sach.php"><input type="submit" value="Them 1 sach"/></a>
</div>
