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
        <title>  write page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

        <!-- 글 작성 -->
        <div class="writing writing-btn">
            <h1> ⟅/ᐠ• -•) 글을 작성하세요 (•- •マ⟆ </h1>
            <form method="POST" action="/controllers/writeController.php" enctype="multipart/form-data">
                <table class="writingTable">
                    <tr>
                        <th width="80">TITLE</th>
                        <td><input class="title" type="text" name="title" placeholder="제목을 입력하세요" ></td>
                    </tr>
                    <tr>
                        <th width="80">CONTENTS</th>
                        <td><textarea class="contents" name="contents" placeholder="내용을 입력하세요" ></textarea></td>
                    </tr>
                    <tr>
                        <th width="80">FILE</th>
                        <td><input type="file" name="myfile"></td>
                    </tr>
                </table>
                <button class="custom-btn btn-1 locate-btn" type="submit">REGISTER</button>
            </form>
            <form action="list.php" id="write-button">
                <button class="custom-btn btn-1 locate-btn" type="submit">CANCEL</button>
            </form>
        </div>
    </body>
</html>