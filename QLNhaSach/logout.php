<?php 
    session_start();
    unset($_SESSION["usrName"]);
    unset($_SESSION["usrId"]);
    unset($_SESSION["fullName"]);
    unset($_SESSION["role"]);

    header("Location:login.php");
?>