

<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
    }


    require_once '/var/www/html/utils/conDB.php';

    $hashPwd=hash('sha256', $password);

    $sql="select * from hashPwd where id='".$username."'";

    $result = mysqli_query($db_conn, $sql);

    if(!$result){
        header("Location: /views/login.php?error=1");
        exit;
    }

    $row = mysqli_fetch_array($result);

    if($row['hashPassword']==$hashPwd){ 
        $_SESSION["username"] = $username;
        $_SESSION["is_login"] = true;

        header("location: /views/main.php");
        exit();
    }else{    
        header("Location: /views/login.php?error=1");
        exit;
    }


?>