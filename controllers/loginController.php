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

    // 로그인 id 조회 sql
    $sql="select id, password from userDB where id='".$username."'";

    // sql 결과 저장
    $result = mysqli_query($db_conn, $sql);

    // id 확인: 틀렸을 경우, 로그인 페이지로 연결
    if(!$result){
        header("Location: /views/login.php?error=1");
        exit;
    }

    // mysql을 array 형태로 가져옴
    $row = mysqli_fetch_array($result);

    // password 확인 
    if($row['password']==$password){ // 비밀번호 일치
        // 로그인 성공한 경우, 세션에 사용자 정보 저장
        $_SESSION["username"] = $username;
        $_SESSION["is_login"] = true;

        // 로그인 완료 후 리다이렉트
        header("location: /views/main.php");
        exit();
    }else{      //비밀번호 오류: login.php로 에러값 반환
        $_SESSION["username"] = "";
        $_SESSION["is_login"] = false;
        header("Location: /views/login.php?error=1");
        exit;
    }


?>