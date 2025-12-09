<!-- 게시글 내용 확인 -->

<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board.css">
        <title>  board_read page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <div class="logoutButton">
        <a href="/controllers/logoutController.php"> 로그아웃 </a>
        </div>
        <div class="mypageButton">
        <a href="/views/mypage.php"> mypage </a>
        </div>
        <div class="mypageButton">
        <a href="/board/list.php"> board </a>
        </div>

        <!-- 게시글 출력 -->
        <div class="reading">
            <?php
            // postingInfo : idx
            $idx=isset($_GET['postingInfo']) ? $_GET['postingInfo'] : 1;
            require_once '/var/www/html/utils/conDB.php';
            $sql=<<<SQL
            select title, id, create_at, views, contents from board 
            where idx='$idx'
            SQL;
            $postingRes=mysqli_query($db_conn, $sql);
            $postingInfo=mysqli_fetch_array($postingRes);
            ?>

            <!-- 게시글 제목 출력 -->
            <h1> <?php echo $postingInfo['title']; ?> </h1>
            <!-- 작성 정보 출력(작성자, 게시 날짜, 조회수) -->
            <div class="user_info">
                <p>
                    <b>작성자</b>
                    <?php echo $postingInfo['id']; ?> | <?php echo $postingInfo['create_at'];?> | <b>조회수 </b><?php echo $postingInfo['views']; ?>
                </p>
            </div>
            <!-- 본문 출력 -->
            <div class="content">
                <?php echo nl2br($postingInfo['contents']); ?>
            </div>

            <!-- 버튼 -->
            <form action="list.php" id="write-button">
            <input type="submit" value="돌아가기">
            </form>

            <?php if($_SESSION['username']==$postingInfo['id']){ ?>
                <form action="list.php" id="write-button">
                <input type="submit" value="삭제하기">
                </form>
                <form action="list.php" id="write-button">
                <input type="submit" value="수정하기">
                </form>
            <?php } ?>

            <!-- 댓글 -->


        </div>
    </body>
</html>