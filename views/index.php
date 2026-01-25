<?php
    require_once '/var/www/html/utils/errorCheck.php';
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="/css/menubar_index.css">

<header>

    <h1 class="logo-bar con-min-width">
        <div class="text-align-center con">
        <a href="#" class="logo-bar__logo">
            <span class="ico-1"><i class="fa-solid fa-plane"></i></span>
            <span>
            <span>TEST</span>
            </span>
        </a>
        </div>
    </h1>

    <h2 class="menu-bar__nemu-box-1 con-min-width">
        <div class="con">
            <nav class="menu-bar__menu-box-1 text-align-center">
                <ul class="inline-grid">
                    <li><a href="#" class="block">로그인</a></li>
                    <li><a href="#" class="block">회원가입</a></li>
                    <li><a href="#" class="block">Q&A</a></li>
                </ul>
            </nav>
        </div>
    </h2>
</header>

</html>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <title> main page </title>
</head>
<body>
    <div class="login-wrapper">
        <h2>메인 페이지</h2>
        <h3>로그인 하세요.</h3>
        <!-- id, password 값을 받아서 loginController.php로 전달 -->
        <form action="/controllers/loginController.php" id="login-form">
            <input type="submit" value="login">
        </form>
    </div>
</body>