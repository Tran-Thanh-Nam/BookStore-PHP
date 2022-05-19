<?php
       include_once("./models/sachclass.php");
?>
<div class="row">
    <h2>Thư Viện Sách</h2>
</div>
<?php
    $sach = new sachclass();
    $arr = $sach->select_all();
?>

<div class="danhsach">
   <div class="row">
   <?php foreach($arr as $item){
    ?>        
        <div class="sach col-md-4">
            <div class="tieude" style="color:blue; font-weight:bold;">                           
                <?php echo $item["ten_sach"]; ?>
            </div>

            <div class="hinh">
                <img width="300" height="300" src="<?php echo $item["hinhanh"]; ?>" />
            </div>
            
            <div class="gia">
                <?php  echo "Giá: ".$item["gia"]; ?>
            </div>
            <div class="sl"><strong>Số lượng:</strong>
                <input type="number" name="number" value="1" min="1" id="num">
            </div>
            <button class="mua" style="background-color: #fed610; border:none;" onclick="addCart(<?php echo $arr[0][0]; ?>)">Đăt hàng</button>
            <hr>
        </div>
   <?php } ?>
   </div>
</div>




               
            