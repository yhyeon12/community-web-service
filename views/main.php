<?php
session_start();
$name=isset($_SESSION['username'])? $_SESSION['username']:"";

// 전달 받은 값이 없는 경우, 멈춤
if($name==""){
    header("Location: /views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/main.css">
        <title> Main Page </title>
    </head>

    <body>
        
        <!-- 로그인 성공한 사용자 이름 출력 -->
        <p> 🥳 로그인 성공 🥳</p>
        <p>접속자 : <b><?php echo htmlspecialchars($name); ?></b></p> 

    </body>
</html>