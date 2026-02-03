
<?php

    define('DB_SERVER', 'localhost');      
    define('DB_MANAGERNAME', 'user');      
    define('DB_PASSWORD', 'ubuntu1027');    
    define('DB_NAME', 'test');              

    $db_conn=mysqli_connect(DB_SERVER, DB_MANAGERNAME, DB_PASSWORD, DB_NAME);
    
    if (!$db_conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
    }
?>