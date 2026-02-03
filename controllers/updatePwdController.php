<!-- 식별 인증(분리+해시)/성공 -->

<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();
    $lenLimit=4;

    // POST인 경우 - login 정보 받음
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $userId=$_POST["userId"];
        $oldPwd=$_POST["oldPwd"];
        $newPwd=$_POST["newPwd"];
    }
    if(mb_strlen($newPwd)<$lenLimit){
        header("location: /views/mypage.php?error=3");
        exit;
    }

    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';

    // sha256 해시값 생성
    $hashPwd=hash('sha256', $oldPwd);

    // 로그인 id, pwd 조회 쿼리
    $sql=<<<SQL
    SELECT * FROM hashPwd
    WHERE id = '$userId'
    SQL;

    // sql 결과 저장
    $result = mysqli_query($db_conn, $sql);

    // id 확인: 틀렸을 경우, 로그인 페이지로 연결
    if(!$result){
        header("Location: /views/login.php?error=1");
        exit;
    }

    // mysql을 array 형태로 가져옴
    $row = mysqli_fetch_array($result);

    // password 해시값 일치 여부 확인 
    if($row['hashPassword']==$hashPwd){ 
        // 비밀번호 일치한 경우, 비밀번호 업데이트
        $newHashPwd=hash('sha256', $newPwd);
        $updateSql=<<<SQL
        UPDATE hashPwd
        SET hashPassword = '$newHashPwd'
        WHERE id = '$userId'
        SQL;
        mysqli_query($db_conn, $updateSql);

        header("location: /views/mypage.php?success=2");
        exit();
    }else{
        header("location: /views/mypage.php?error=1");
    }


?>