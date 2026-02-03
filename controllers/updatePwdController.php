
<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();
    $lenLimit=4;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $userId=$_POST["userId"];
        $oldPwd=$_POST["oldPwd"];
        $newPwd=$_POST["newPwd"];
    }
    if(mb_strlen($newPwd)<$lenLimit){
        header("location: /views/mypage.php?error=3");
        exit;
    }

    require_once '/var/www/html/utils/conDB.php';

    $hashPwd=hash('sha256', $oldPwd);

    $sql=<<<SQL
    SELECT * FROM hashPwd
    WHERE id = '$userId'
    SQL;

    $result = mysqli_query($db_conn, $sql);

    if(!$result){
        header("Location: /views/login.php?error=1");
        exit;
    }

    $row = mysqli_fetch_array($result);

    if($row['hashPassword']==$hashPwd){ 
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