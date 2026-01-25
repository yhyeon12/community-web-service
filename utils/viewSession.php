<!-- 단순 세션 상태 확인 -->

<?php

    session_start();
    $name=isset($_SESSION['username'])? $_SESSION['username']:"";
    $state=isset($_SESSION['is_login'])? $_SESSION['is_login']:"";

?>