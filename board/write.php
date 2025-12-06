<!-- 게시글 작성 페이지 -->
<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board.css">
        <title>  write page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <div class="logoutButton">
        <a href="/controllers/logoutController.php"> 로그아웃 </a>
        </div>
        <div class="mypageButton">
        <a href="/views/mypage.php"> mypage </a>
        </div>

        <!-- 글 작성 -->
        <div class="writing">
            <h1> 글을 작성하세요 </h1>
            <form method="POST" action="/controllers/writeController.php">
                <table class="writeTable">
                    <tr>
                        <th width="50">제목</th>
                        <td><input type="text" name="title" placeholder="제목을 입력하세요" ></td>
                    </tr>
                    <tr>
                        <th width="50">내용</th>
                        <td><textarea name="content" rows="5" cols="40" placeholder="내용을 입력하세요" ></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="등록">
            </form>
            <form action="list.php" id="write-button">
            <input type="submit" value="취소">
            </form>
        </div>
    </body>
</html>