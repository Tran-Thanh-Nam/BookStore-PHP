<?php
       include_once("./models/nxbclass.php");
?>
<div class="row">
    <h3>Danh Các Nhà Xuất Bản</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma Nha Xuat Ban </td>
                <td> Ten NXB</td> 
                <td> Dia Chi</td> 
                <td> Email</td> 
                <td>#</td>                                        
            </tr>          
        </thead>      
        <?php
            $nxb = new nxbclass();
            $arr = $nxb->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $nxb = new nxbclass();
                    $kq = $nxb->delete_nxb($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:nxb.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_nxb']."</td>";
                echo "<td>".$item['ten_nxb']."</td>";    
                echo "<td>".$item['dia_chi']."</td>";   
                echo "<td>".$item['email']."</td>";                          
                echo "<td>";
                echo "<a class='btn btn-danger' href='editnxb.php?id=".$item['ma_nxb']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='nxb.php?id=".$item['ma_nxb']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_nxb.php"><input type="submit" value="Them NXB"/></a>
</div>
