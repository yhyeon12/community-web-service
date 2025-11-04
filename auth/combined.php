<!-- 식별 인증(동시)/ 성공 -->

<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - login 정보 받음
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
    }

    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';

    // 로그인 id 조회 쿼리
    $sql="select * from userDB where id='".$username."' and password='".$password."'";

    // 쿼리 결과 저장
    $result = mysqli_query($db_conn, $sql);
    $resNum = mysqli_num_rows($result);

    // id 확인: 조회된 정보가 없을 경우, 로그인 페이지로 연결
    if($resNum>0){
        // 로그인 성공한 경우, 세션에 사용자 정보 저장
        $_SESSION["username"] = $username;
        $_SESSION["is_login"] = true;

        // 로그인 완료 후 리다이렉트
        header("location: /views/main.php");
        exit();
    }else{
        header("Location: /views/login.php?error=1");
        exit;
    }
?>