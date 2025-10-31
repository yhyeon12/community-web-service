<?php
// 에러 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
?>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <title> login page </title>
</head>
<body>
    <div class="login-wrapper">
        <h2>Login</h2>
        <!-- id, password 값을 받아서 loginController.php로 전달 -->
        <form method="POST" action="/controllers/loginController.php" id="login-form">
            <input type="text" name="username" placeholder="ID">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Login">
        </form>

        <!-- 로그인이 실패한 경우($error==1, true인 경우) -->
        <?php if ($error): ?>
            <p style="color: red; margin-top: 10px;">아이디 또는 비밀번호가 잘못되었습니다.</p>
        <?php endif; ?>

    </div>
</body>