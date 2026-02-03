<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - register 정보 받음
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $mail=$_POST["e-mail"];
    }

    // 회원정보 중 빈 값이 있을 경우, 회원등록 취소
    if($username==''||$password==''||$mail==''){
        header("Location: /views/register.php?error=2");
        exit;
    }

    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';

    // sha256 해시값 생성
    $hashPwd=hash('sha256', $password);

    // id와 메일 주소 조회 쿼리
    $selID="select * from userDB where id='".$username."'";
    $selMail="select * from userDB where mailAddr='".$mail."'";
    $selHash="select * from hashPwd where id='".$username."'";
    // 쿼리 결과 저장
    $veriID=mysqli_query($db_conn, $selID);
    $veriMail=mysqli_query($db_conn, $selMail);
    $veriHash=mysqli_query($db_conn, $selHash);
    // 조회된 행의 개수로 반환
    $rowID=mysqli_num_rows($veriID);
    $rowMail=mysqli_num_rows($veriMail);
    $rowHash=mysqli_num_rows($veriHash);

    // 해당 ID 또는 email 주소가 있는 경우
    if($rowID>0 || $rowMail>0 || $rowHash>0){
        header("Location: /views/register.php?error=1");
        exit;
    }

    // 회원 정보 삽입 및 로그인 페이지로 리다이렉트
    $userInfoSql="insert into userDB(id, mailAddr) values('".$username."', '".$mail."')";
    $hashInfoSql="insert into hashPwd(id, hashPassword) values('".$username."', '".$hashPwd."')";
    $updateUser=mysqli_query($db_conn, $userInfoSql);
    $updateHash=mysqli_query($db_conn, $hashInfoSql);
    header("Location: /views/login.php?success=2");

?>