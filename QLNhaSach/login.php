<?php

?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/jquery-ui.css" type="text/css" rel="stylesheet">
        <script language="JavaScript" type="text/javascript" src="js/jquery-ui.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/jquery-1.12.4.js"></script>
        <title>Đăng nhập</title>
    </head>
    <body>
        
    <?php
        include_once("models/users.php");
        session_start();
    ?>

        <header class="bg-secondary text-white p-3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>CÔNG NGHỆ THÔNG TIN</h3>
                    </div>
                    <div class="col">
                        <h2>Quản Lý Nhà Sách</h2>
                    </div>
                </div>  
            </div>
        </header>

        <div id="wrapper">
            <div class="container">
                <?php
                    if(!empty($_SESSION["role"])){ //session da ton tai ==> kiem tra
                        check_role($_SESSION["role"]);
                    }
                    //chua dang nhap ==> kiem tra usernam, password
                    if(!empty($_POST["txtUsername"]) && !empty($_POST["txtPass"])){// ca 2 khac rong
                        $muser= new Users();
                        $kq = $muser->login($_POST["txtUsername"], $_POST["txtPass"]);
                        if(count($kq)>0)
                        {
                            $role = $kq[0]["quyen"];
                            $_SESSION["usrName"] = $kq[0]["username"];
                            $_SESSION["usrId"] = $kq[0]["ma_kh"];
                            $_SESSION["fullName"] = $kq[0]["ten_kh"];
                            $_SESSION["role"] = $role;
                            check_role($role);
                        }
                        else{
                            $Error ="không tìm thấy";
                        }
                    }
                    else{
                        if(!empty( $_POST["txtUsername"]) || !empty( $_POST["txtPass"])){
                            $Error ="UserName & password không được rỗng";
                        }
                        else{
                            $Error="";
                        }
                    }

                    function check_role($role){
                        if($role == '0'){
                            header('Location: index.php');
                        }
                        else{

                            header('Location: nguoidung.php');
                        }exit();
                    }
                ?>           


                <div class="row">
                    <form method="post" action="login.php" class="col-md-8">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="txtUsername" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="txtPass" class="form-control">

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="btnSubmit" type="submit"> Dang Nhap</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        <div id="footer">
            <?php
                include_once("Views/v_footer.php");
            ?>
        </div>
    </body>
</html>