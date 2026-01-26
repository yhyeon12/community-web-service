<!-- 게시글 작성 페이지 -->
<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board_write.css">
        <link rel="stylesheet" href="/css/global.css">
        <title>  edit page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

        <!-- 글 작성 -->
        <div class="writing writing-btn">

            <?php
            // postingInfo : idx
            $idx=isset($_GET['idx']) ? $_GET['idx'] : "";
            require_once '/var/www/html/utils/conDB.php';
            $sql=<<<SQL
            select title, contents from board 
            where idx='$idx'
            SQL;
            $postingRes=mysqli_query($db_conn, $sql);
            $postingInfo=mysqli_fetch_array($postingRes);
            ?>


            <h1> ʕ｡•ﻌ•｡ʔ 글을 수정하세요 ʕ｡•ﻌ•｡ʔ</h1>
            <form method="POST" action="/controllers/editController.php">
                <input type="hidden" name="idx" value="<?php echo $idx ?>">
                <table class="writingTable">
                    <tr>
                        <th width="80">TITLE</th>
                        <td><input class="title" type="text" name="title" value="<?php echo $postingInfo['title']?>"></td>
                    </tr>
                    <tr>
                        <th width="80">CONTENTS</th>
                        <td><textarea class="contents" name="contents" > <?php echo $postingInfo['contents']?> </textarea></td>
                    </tr>
                </table>
                <button class="custom-btn btn-1 locate-btn" type="submit" onclick="return confirm('수정하시겠습니까?');">EDIT</button>
            </form>
            <form action="list.php" id="write-button">
                <button class="custom-btn btn-1 locate-btn" onclick="history.back()";>CANCEL</button>
            </form>
        </div>
    </body>
</html>