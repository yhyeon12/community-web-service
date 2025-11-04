<?php
    require_once '/var/www/html/utils/errorCheck.php';
?>


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