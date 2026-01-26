<!-- 게시글 내용 확인 -->

<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/authGuard.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board_read.css">
        <link rel="stylesheet" href="/css/global.css">
        <title>  board_read page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

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
                    <b>작성자 :</b>
                    <?php echo $postingInfo['id']; ?> | <?php echo $postingInfo['create_at'];?> | <b>조회수 </b><?php echo $postingInfo['views']; ?>
                </p>
            </div>
            <!-- 본문 출력 -->
            <div class="contents">
                <?php echo nl2br($postingInfo['contents']); ?>
            </div>

            <!-- 버튼 -->
             <a href="list.php">
                <button class="custom-btn btn-1 align-btn">BACK</button>
             </a>
            <?php if($_SESSION['username']==$postingInfo['id']){ ?>
                
                <a href="/controllers/deleteController.php?idx=<?php echo $idx ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                    <button class="custom-btn btn-1 align-btn">DELETE</button>
                </a>
                <a href="edit.php?idx=<?php echo $idx ?>">
                    <button class="custom-btn btn-1 align-btn">EDIT</button>
                </a>
            <?php } ?>

            <!-- 댓글 -->


        </div>
    </body>
</html>