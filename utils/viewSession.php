<!-- 세션 상태 확인 -->

<?php

    session_start();
    $name=isset($_SESSION['username'])? $_SESSION['username']:"";
    $state=isset($_SESSION['is_login'])? $_SESSION['is_login']:"";

    // 전달 받은 값이 없는 경우, 멈춤
    // if($name==""){
    //     header("Location: /views/login.php");
    //     exit();
    // }
    // 세션 상태 확인
    // if($state==""){
    //     header("Location: /views/login.php?state=3");
    //     exit();
    // }

?>