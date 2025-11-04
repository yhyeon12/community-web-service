<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - register 정보 받음
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $mail=$_POST["e-mail"];
    }

    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';

    // id와 메일 주소 조회 쿼리
    $selID="select * from userDB where id='".$username."'";
    $selMail="select * from userDB where mailAddr='".$mail."'";
    // 쿼리 결과 저장
    $veriID=mysqli_query($db_conn, $selID);
    $veriMail=mysqli_query($db_conn, $selMail);
    // 조회된 행의 개수 숫자로 반환
    $rowID=mysqli_num_rows($veriID);
    $rowMail=mysqli_num_rows($veriMail);

    // 해당 ID 또는 email 주소가 있는 경우
    if($rowID>0 || $rowMail>0){
        header("Location: /views/register.php?error=1");
        exit;
    }

    // 회원 정보 삽입 및 로그인 페이지로 리다이렉트
    $userInfoSql="insert into userDB(id, password, mailAddr) values('".$username."', '".$password."', '".$mail."')";
    $updateUser=mysqli_query($db_conn, $userInfoSql);
    header("Location: /views/login.php?success=2");

?>