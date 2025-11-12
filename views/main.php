<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/login.css">
        <title> Main Page </title>
    </head>

    <body>
        <div class="login-wrapper">
        <!-- 로그인 성공한 사용자 이름 출력 -->
        <h2>메인 페이지</h2>
        <h3> 🥳 로그인 성공 🥳</h3>
        <p>접속자 : <b><?php echo htmlspecialchars($name); ?></b></p> 
        <?php 
            // 로그아웃 버튼 생성
            echo 
            '<form action="/controllers/logoutController.php" id="login-form">
            <input type="submit" value="logout"/>
            </form>';
            // 마이페이지 버튼 생성
            echo 
            '<form action="/views/mypage.php" id="login-form">
            <input type="submit" value="my page"/>
            </form>';
            // 게시판 버튼 생성
            echo 
            '<form action="/board/list.php" id="login-form">
            <input type="submit" value="게시판"/>
            </form>';
        ?>
        </div>

    </body>
</html>