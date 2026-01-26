<?php
    
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/authGuard.php';

    // -------------------- DB에서 회원 정보 가져오기 --------------------
    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';
    // 로그인 id 조회 쿼리 생성
    $sql="select mailAddr from userDB where id='".$name."'";
    // sql 결과 저장
    $veriMail = mysqli_query($db_conn, $sql);
    $rowMail = mysqli_fetch_array($veriMail);
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/global.css">
        <title> mypage </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

    
        <div class="align-btn">
        <h1>MY PAGE</h1>
        <h2>~(ᵕ ̫  ᵕ ~) 회원 정보 (~ ᵕ ̫ ᵕ)~</h2>
        <p>이름 : <b><?php echo htmlspecialchars($name); ?></b></p> 
        <p>이메일 : <b><?php echo htmlspecialchars($rowMail['mailAddr']); ?></b></p> 

        <!-- 다른 페이지 이동 -->
        <form action="/views/main.php" id="login-form">
            <button class="custom-btn btn-1 locate-btn" type="submit">MAIN</button>
        </form>

        </div>
    </body>
</html>