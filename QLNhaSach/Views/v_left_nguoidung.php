<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #29cece42;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #528ec0e6;
  color: white;
}
</style>
<ul>
    <li><a href="nguoidung.php" > <i class="fa fa-home"></i> Mua Hàng</a></li>
    <?php 
            if($_SESSION["usrName"] != null) {
        ?>
            <li><a href="logout.php"> <i class="fa fa-sign-out-alt"></i> Thoát</a></li>
        <?php }  else { ?>
            <li><a href="login.php"> <i class="fa fa-sign-in"></i> Đăng nhập</a></li>
    <?php } ?>
</ul>
        
<hr/>

