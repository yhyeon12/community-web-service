<!-- DB 연결 -->

<?php

    // DB연결 계정 정보 정의
    define('DB_SERVER', 'localhost');       // DB 서버 IP 주소 정의
    define('DB_MANAGERNAME', 'user');       // 접속자 정의
    define('DB_PASSWORD', 'ubuntu1027');    // 접속자 패스워드 정의
    define('DB_NAME', 'test');              // 사용자 DB 정의

    // DB 연결
    $db_conn=mysqli_connect(DB_SERVER, DB_MANAGERNAME, DB_PASSWORD, DB_NAME);
    
    // 연결 실패 시 스크립트 종료
    if (!$db_conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
    }
?>