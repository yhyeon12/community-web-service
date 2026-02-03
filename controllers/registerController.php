<?php
    require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $mail=$_POST["e-mail"];
    }

    if($username==''||$password==''||$mail==''){
        header("Location: /views/register.php?error=2");
        exit;
    }

    require_once '/var/www/html/utils/conDB.php';

    $hashPwd=hash('sha256', $password);

    $selID="select * from userDB where id='".$username."'";
    $selMail="select * from userDB where mailAddr='".$mail."'";
    $selHash="select * from hashPwd where id='".$username."'";

    $veriID=mysqli_query($db_conn, $selID);
    $veriMail=mysqli_query($db_conn, $selMail);
    $veriHash=mysqli_query($db_conn, $selHash);

    $rowID=mysqli_num_rows($veriID);
    $rowMail=mysqli_num_rows($veriMail);
    $rowHash=mysqli_num_rows($veriHash);

    if($rowID>0 || $rowMail>0 || $rowHash>0){
        header("Location: /views/register.php?error=1");
        exit;
    }

    $userInfoSql="insert into userDB(id, mailAddr) values('".$username."', '".$mail."')";
    $hashInfoSql="insert into hashPwd(id, hashPassword) values('".$username."', '".$hashPwd."')";
    $updateUser=mysqli_query($db_conn, $userInfoSql);
    $updateHash=mysqli_query($db_conn, $hashInfoSql);
    header("Location: /views/login.php?success=2");

?>