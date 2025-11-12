<?php
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/viewSession.php';
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/login.css">
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
            <button onclick="writePost()"> 글쓰기 </button>

            <table>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
                <?php
                require_once '/var/www/html/utils/conDB.php';

                // board 테이블의 데이터를 최신 순으로 받아옴
                $boardSql=<<<SQL
                select title, id, create_at, views from board
                order by create_at desc
                limit start_row, n
                SQL;
                
                ?>
            </table>
        </div>



        <!-- 함수 -->
        <div>
            <script>
                // 접속자 확인 및 글 작성 페이지로 로드
                function writePost(){
                    require_once '/var/www/html/utils/viewSession.php';
                    location.href='write.php';
                }
            </script>
        </div>

    </body>
</html>