<!-- 글 목록 조회 -->
<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/authGuard.php';
    require_once '/var/www/html/board/pagination.php';

// 에러, 성공, 상태 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board_list.css">
        <link rel="stylesheet" href="/css/global.css">
        <title>  board page </title>
    </head>

    <body>
        <!-- 메뉴 -->
        <?php include "/var/www/html/views/menu.php"; ?>

        <!-- 게시판 목록 조회 -->
        <div class="list">
            <h1> BOARD </h1>
            <form action="write.php" id="write-button">
                <button class="custom-btn btn-1 locate-btn" type="submit">WRITE</button>
            </form>

            <table>
                <thead>
                <tr>
                    <th width="70">NUM</th>
                    <th width="500">TITLE</th>
                    <th width="120">WRITER</th>
                    <th width="100">DATE</th>
                    <th width="100">VIEWS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($array=mysqli_fetch_array($boardInfo)){ ?>
                <tr>
                    <td><?php echo $idx; ?></td>
                    <td><a href="read.php?postingInfo=<?php echo $array['idx']; ?>"><?php echo $array['title']; ?></a></td>
                    <td><?php echo $array['id']; ?></td>
                    <td><?php echo $array['create_at']; ?></td>
                    <td><?php echo $array['views']; ?></td>
                </tr>

                <?php
                $idx++;
                }
                ?>
                </tbody>
            </table>
        </div>
        
        <!-- 페이지 관리 -->
         <div class="page">
            <!-- 이전 페이지 -->
            <a href="list.php?page=<?php echo $prePage ?>"> 이전 </a>
            <!-- 페이징 처리 -->
            <?php for($printPage=$prePage; $printPage<=$nextPage; $printPage++){ ?>
            <a href="list.php?page=<?php echo $printPage; ?>"> <?php echo $printPage ?> </a>
            <?php } ?>
            <!-- 다음 페이지 -->
             <a href="list.php?page=<?php echo $nextPage ?>"> 다음 </a>
         </div>
        
         <!-- 글 등록 성공(success=2) -->
         <?php if($success==2): ?>
            <script>alert("글이 등록되었습니다.")</script>
         <?php endif; ?>
         <!-- 글 삭제 성공(success=3) -->
         <?php if($success==3): ?>
            <script>alert("글이 삭제되었습니다.")</script>
         <?php endif; ?>
    </body>
</html>