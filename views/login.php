<?php
// 에러, 성공, 상태 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
$state = isset($_GET['state']) ? $_GET['state'] : "";
?>

<head>
    <link rel="stylesheet" href="/css/login.css">
    <title> login page </title>
</head>
<body>
    <div class="login-wrapper">
        <h2>Login</h2>
        <!-- id, password 값을 받아서 loginController.php로 전달 -->
        <form method="POST" action="/auth/combHashNl.php" id="login-form">
            <input type="text" name="username" placeholder="ID">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Login">
        </form>

        <!-- 로그인이 실패한 경우($error==1, true인 경우) -->
        <?php if ($error): ?>
            <p style="color: red; margin-top: 10px;">아이디 또는 비밀번호가 잘못되었습니다.</p>
        <?php endif; ?>

        <form action="/views/register.php" id="login-form">
            <input type="submit" value="회원가입"/>
        </form>

        <form action="/views/index.php" id="login-form">
            <input type="submit" value="메인 페이지"/>
        </form>

        <!-- 회원가입 성공한 경우($success==2, true인 경우) -->
        <?php if ($success):
            echo '<script>alert("회원가입에 성공하셨습니다! 로그인하세요.")</script>';
        endif; ?>

        <!-- 세션 상태 만료인 경우($state==3, true인 경우) -->
        <?php if ($state):
            echo '<script>alert("시간이 만료되었습니다. 다시 로그인하세요.")</script>';
        endif; ?>
    </div>
</body>