<?php
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
?>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/global.css">
    <title>register page</title>
</head>

<body>

    <?php include "/var/www/html/views/menu.php"; ?>

    <div class="login-wrapper align-btn">

    <h1>REGISTER</h1>
    <form method="POST" action="/controllers/registerController.php" id="login-form">
        <input type="text" name="username" placeholder="ID">
        <input type="password" name="password" placeholder="password">
        <input type="text" name="e-mail" placeholder="e-mail">
        <button class="custom-btn btn-1 locate-btn" type="submit">REGISTER</button>
    </form>

    <?php if ($error==1): ?>
        <p style="color: red; margin-top: 10px;">아이디 또는 이메일 주소 중복. 다른 데이터를 입력하시오.</p>
    <?php endif; ?>
    <?php if ($error==2): ?>
        <p style="color: red; margin-top: 10px;">빈 칸이 있습니다. 모든 칸을 채워주세요.</p>
    <?php endif; ?>
    </div>

</body>


