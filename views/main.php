<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/global.css">
        <title> Main Page </title>
    </head>

    <body>

        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

        <div class="main align-btn">
            <!-- 로그인 성공한 사용자 이름 출력 -->
            <h1>MAIN PAGE</h1>
            <?php if($name==""||$state=="") { ?>
            <h2> 로그인 하세요. </h2>
            <form action="/views/login.php" id="login-form">
                <button  class="custom-btn btn-1 locate-btn" type="submit">LOGIN</button>
            </form>
            <?php }else{ ?>
            <h2> ٩( ᐢᗜᐢ) 로그인 성공 (ᐢᗜᐢ )و </h2>
            <p>접속자 : <b><?php echo htmlspecialchars($name); ?></b></p> 
            
            <!-- 마이페이지 -->
            <form action="/views/mypage.php" id="login-form">
                <button class="custom-btn btn-1 locate-btn" type="submit">MYPAGE</button>    
            </form>
            <!-- 게시판 -->
            <form action="/board/list.php" id="login-form">
                <button class="custom-btn btn-1 locate-btn" type="submit">BOARD</button>
            </form>
            <!-- 로그아웃 -->
            <form action="/controllers/logoutController.php" id="login-form">
                <button class="custom-btn btn-1 locate-btn" type="submit">LOG-OUT</button>
            </form>
            <?php } ?>
        </div>

    </body>
</html>