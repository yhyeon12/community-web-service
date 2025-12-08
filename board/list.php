<!-- 글 목록 조회 -->
<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
    require_once '/var/www/html/board/pagination.php';

// 에러, 성공, 상태 메시지 수신 여부 확인
$error = isset($_GET['error']) ? $_GET['error'] : "";
$success = isset($_GET['success']) ? $_GET['success'] : "";
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/board.css">
        <title>  board page </title>
    </head>

    <body>
        <!-- 각종 버튼 -->
        <div class="logoutButton">
        <a href="/controllers/logoutController.php"> 로그아웃 </a>
        </div>
        <div class="mypageButton">
        <a href="/views/mypage.php"> mypage </a>
        </div>

        <!-- 게시판 목록 조회 -->
        <div class="list">
            <h1> 자유 게시판 </h1>
            <form action="write.php" id="write-button">
                <input type="submit" value="글쓰기">
            </form>

            <table>
                <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
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
            <?php var_dump($totalPage, $startList, $endList) ?>
            <!-- 이전 페이지 -->
            <?php
            if($curPage<=1){?>
            <a href="list.php?page=1"> 이전 </a>
            <?php }else{ ?>
            <a href="list.php?page=<?php echo ($curPage-1); ?>"> 이전 </a>
            <?php };?>

            <!-- 페이지 번호 -->
            <?php if($curPage<=2){      // 현재 페이지 번호가 2 이하일 경우
                for($printPage=1; $printPage<$totalPage; $printPage++)?>
                <a href="list.php?page=<?php echo $printPage; ?>"> <?php echo $printPage ?> </a>
                <?php if($printPage>$pageBtNum) exit;   //$pageBtNum<$totalPage 인 경우, 페이지 표시 제한
                }else if($curPage>=$totalPage-1){     // 현재 페이지 번호가 가장 뒷 번호일 경우
                for($printPage=$totalPage-2; $printPage<$totalPage; $printPage++)?>
                <a href="list.php?page=<?php echo $printPage; ?>"> <?php echo $printPage ?> </a>
            <?php } else{               // 현재 페이지가 중간에 위치할 경우
                for($printPage=$prePage; $printPage<$nextPage; $printPage++)?>
                <a href="list.php?page=<?php echo $printPage; ?>"> <?php echo $printPage ?> </a>
            <?php } ?>
                
            <!-- 다음 페이지 -->
             <?php
            if($curPage>=$totalPage){?>
            <a href="list.php?page=<?php echo $curPage ?>"> 다음 </a>
            <?php }else{ ?>
            <a href="list.php?page=<?php echo ($curPage+1); ?>"> 다음 </a>
            <?php };?>
         </div>
        
         <!-- 글 등록 성공(success=1) -->
         <?php if($success==2): ?>
            <script>alert("글이 등록되었습니다.")</script>
         <?php endif; ?>
    </body>
</html>