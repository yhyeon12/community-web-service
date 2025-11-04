<?php
    
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';

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
        <link rel="stylesheet" href="/css/login.css">
        <title> Main Page </title>
    </head>

    <body>
        <div class="login-wrapper">
        <h2>마이 페이지</h2>
        <h3>회원 정보</h3>
        <p>이름 : <b><?php echo htmlspecialchars($name); ?></b></p> 
        <p>이메일 : <b><?php echo htmlspecialchars($rowMail['mailAddr']); ?></b></p> 

        <?php 
            // 메인 페이지로 로드
            echo 
            '<form action="/views/main.php" id="login-form">
            <input type="submit" value="메인 페이지"/>
            </form>';
        ?>

        </div>
    </body>
</html>