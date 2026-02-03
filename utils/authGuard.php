
<?php

    session_start();
    $name=isset($_SESSION['username'])? $_SESSION['username']:"";
    $state=isset($_SESSION['is_login'])? $_SESSION['is_login']:"";

    if($name==""){
        header("Location: /views/login.php");
        exit();
    }
    if($state==""){
        header("Location: /views/login.php?state=3");
        exit();
    }

?>