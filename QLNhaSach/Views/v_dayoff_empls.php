<?php
       include_once("./models/loaisachclass.php");
?>
<div class="row">
    <h3>Danh Sách Thể Loại Sách</h3>
</div>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <td> Ma Loai </td>
                <td> Ten Loai</td> 
                <td>#</td>                                        
            </tr>          
        </thead>      
        <?php
            $loaisach = new loaisachclass();
            $arr = $loaisach->select_all();
            
            if(isset($_GET["xoa"])){
                if($_GET["xoa"] == 1) { 
                    $ma = $_GET["id"];
                    $lsp = new loaisachclass();
                    $kq = $lsp->delete_loaisp($ma);
                    var_dump($kq);
                    if($kq) {
                        
                        header("Location:theloai.php?id=".$ma."&m=1");
                    } else {
                        echo 'Chua thanh cong!';
                    }
                }
                
            }

            foreach( $arr as $item){
                echo "<tr>";
                echo "<td>".$item['ma_the_loai']."</td>";
                echo "<td>".$item['ten_the_loai']."</td>";                           
                echo "<td>";
                echo "<a class='btn btn-danger' href='edittheloai.php?id=".$item['ma_the_loai']."'>
                <i class='far fa-edit'></i></a>";
                echo "<a class='btn btn-warning' href='theloai.php?id=".$item['ma_the_loai']."&xoa=1'>
                <i class='far fa-trash-alt'></i></a>";
                echo "</td>";
                echo "</tr>";
                }
        ?>
    </table>
    <a href="Views/v_new_theloai.php"><input type="submit" value="Them san pham"/></a>
</div>
