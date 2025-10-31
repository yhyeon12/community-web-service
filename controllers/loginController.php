<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    // POST인 경우 - login 정보 받음
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
    }
    

    // DB연결 정보 정의
    define('DB_SERVER', 'localhost');       // DB 서버 IP 주소 정의
    define('DB_MANAGERNAME', 'user');       // 접속자 정의
    define('DB_PASSWORD', 'ubuntu1027');    // 접속자 패스워드 정의
    define('DB_NAME', 'test');              // 사용자 DB 정의

    // DB 연결
    $db_conn=mysqli_connect(DB_SERVER, DB_MANAGERNAME, DB_PASSWORD, DB_NAME);

    // DB 연결 실패 시 로그인 페이지로 연결
    if (!$db_conn) {
    // 연결 실패 시 스크립트 종료
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
    }

    // 로그인 id 조회 sql
    $sql="select id, password from userDB where id='".$username."'";

    // sql 결과 저장
    $result=mysqli_query($db_conn, $sql);

    // id 확인: 틀렸을 경우, 로그인 페이지로 연결
    if(!$result){
        header("Location: /views/login.php?error=1");
        exit;
    }

    // mysql을 array 형태로 가져옴
    $row=mysqli_fetch_array($result);

    // password 확인 
    if($row['password']==$password){
        // 비밀번호 일치
        $_SESSION["username"]=$username;
        header("location: /views/main.php");
        exit();
    }else{
        //비밀번호 오류: login.php로 에러값 반환
        header("Location: /views/login.php?error=1");
        exit;
    }


?>