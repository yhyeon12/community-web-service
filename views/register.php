<?php
// 에러 또는 성공 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
?>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <title>register page</title>
</head>

<body>
    <div class="login-wrapper">

    <h2>Register</h2>
    <form method="POST" action="/controllers/registerController.php" id="login-form">
        <input type="text" name="username" placeholder="ID">
        <input type="password" name="password" placeholder="password">
        <input type="text" name="e-mail" placeholder="e-mail">
        <input type="submit" value="register">
    </form>

    <!-- 회원가입이 실패한 경우($error==1, true인 경우) -->
    <?php if ($error): ?>
        <p style="color: red; margin-top: 10px;">아이디 또는 이메일 주소 중복. 다른 데이터를 입력하시오.</p>
    <?php endif; ?>
    </div>

</body>


