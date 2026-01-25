<?php
require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="/css/menubar.css">

<header class="top-bar con-min-width">

    <div class="con">
        <nav class="top-bar__menu-box-1">
            <ul class="inline-grid">

                <?php if($name==""||$state=="") { ?>
                <li><a href="/views/main.php" class="block">HOME</a></li>
                <li><a href="/views/login.php" class="block">LOGIN</a></li>
                <li><a href="/views/register.php" class="block">REGISTER</a></li>
                <?php } else { ?>
                <li><a href="/views/main.php" class="block">HOME</a></li>
                <li><a href="/board/list.php" class="block">BOARD</a></li>
                <li><a href="/views/mypage.php" class="block">MYPAGE</a></li>
                <li><a href="/controllers/logoutController.php" class="block">LOG-OUT</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>

</html>