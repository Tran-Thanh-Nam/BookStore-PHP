<?php
       include_once("./models/tacgiaclass.php");
?>
<div class="row">
    <h3>Danh Sách Tác Giả</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma Tac Gia </td>
                <td> Ten Tac Gia</td> 
                <td> Website</td> 
                <td> Ghi Chu</td> 
                <td>#</td>                                        
            </tr>          
        </thead>      
        <?php
            $tacgia = new tacgiaclass();
            $arr = $tacgia->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $tg = new tacgiaclass();
                    $kq = $tg->delete_tacgia($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:tacgia.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_tac_gia']."</td>";
                echo "<td>".$item['ten_tac_gia']."</td>";    
                echo "<td>".$item['website']."</td>";   
                echo "<td>".$item['ghichu']."</td>";                          
                echo "<td>";
                echo "<a class='btn btn-danger' href='edittacgia.php?id=".$item['ma_tac_gia']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='tacgia.php?id=".$item['ma_tac_gia']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_tacgia.php"><input type="submit" value="Them tac gia"/></a>
</div>
