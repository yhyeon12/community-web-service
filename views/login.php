<?php
// 에러, 성공, 상태 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
$state = isset($_GET['state']) ? $_GET['state'] : "";
?>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/global.css">
    <title> login page </title>
</head>
<body>

    <!-- 메뉴 -->
    <?php include "/var/www/html/views/menu.php"; ?>

    <div class="login-wrapper align-btn">
        <h1>LOGIN</h1>
        <!-- id, password 값을 받아서 loginController.php로 전달 -->
        <form method="POST" action="/auth/splitHash.php" id="login-form">
            <input type="text" name="username" placeholder="ID">
            <input type="password" name="password" placeholder="password">
            <button  class="custom-btn btn-1 locate-btn" type="submit">LOGIN</button>
        </form>

        <!-- 로그인이 실패한 경우($error==1,2 true인 경우) -->
        <?php if ($error==1): ?>
            <p style="color: red; margin-top: 10px;">아이디 또는 비밀번호가 잘못되었습니다.</p>
        <?php endif; ?>

        <form action="/views/register.php" id="login-form">
            <button class="custom-btn btn-1 locate-btn" type="submit">REGISTER</button>
        </form>

        <!-- 회원가입 성공한 경우($success==2, true인 경우) -->
        <?php if ($success):
            echo '<script>alert("회원가입에 성공하셨습니다! 로그인하세요.")</script>';
        endif; ?>

        <!-- 세션 상태 만료인 경우($state==3, true인 경우) -->
        <?php if ($state):
            echo '<script>alert("세션이 만료되었습니다. 다시 로그인하세요.")</script>';
        endif; ?>
    </div>
</body>