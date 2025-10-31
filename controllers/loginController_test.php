<?php
    session_start();

    // POST인 경우
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
    }

    // 로그인 정보가 admin/admin1234 와의 일치여부 확인
    if($username=="admin" && $password=="admin1234"){
        $_SESSION["username"]=$username;
        header("location: /views/main.php");
        exit();
    }else{
        //admin이 아닌 경우, login.php로 에러값 반환
        header("Location: /views/login.php?error=1");
        exit;
    }