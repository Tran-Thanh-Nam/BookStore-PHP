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
    <li><a href="index.php" > <i class="fa fa-home"></i> ADMIN</a></li>
    <li><a href="theloai.php" > <i class="fa fa-bookmark"></i> Thể loại</a></li>
    <li><a href="sach.php" > <i class="fa fa-book"></i> Sách</a></li>
    <li><a href="nhanvien.php" > <i class="fa fa-users"></i> Nhân viên</a></li>
    <li><a href="tacgia.php" > <i class="fa fa-user" aria-hidden="true"></i> Tác giả</a></li>
    <li><a href="nxb.php" > <i class="fa fa-car" aria-hidden="true"></i> NXB</a></li>
    <?php 
        if($_SESSION["usrName"] != null) {
    ?>
        <li><a href="logout.php" > <i class="fa fa-sign-out-alt"></i> Thoát</a></li>
    <?php }  else { ?>
        <li><a href="login.php" > <i class="fa fa-sign-in"></i> Đăng nhập</a></li>
    <?php } ?>
</ul>
<hr/>
