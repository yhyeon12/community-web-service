<?php
require_once '/var/www/html/utils/conDB.php';
//session_start();

// 변수 정의
$listNum=5;                             // 한 번에 조회되는 게시글의 수
$pageBtNum=3;                          // 한 번에 보여지는 페이지 버튼 수
$curPage=isset($_GET['page']) ? $_GET['page'] : 1; // 현재 페이지 위치

// 총 게시글 수 구하기
$postSql="select count(*) from board";        // 총 게시글 수 조회 쿼리
$postDB=mysqli_query($db_conn, $postSql);     // 쿼리 실행
$postRow=mysqli_fetch_row($postDB);           // 게시글 수 저장
$totalPost=$postRow[0];         // 게시글 수 저장

// 페이지 처리 관련 변수 정의
$totalPage=ceil($totalPost/$listNum);                   // 총 페이지 수
$startList=($totalPage-$curPage)*10+($totalPost%10)-1;    // 현재 페이지의 시작행 번호(top)
$endList=($totalPage==$curPage) ? 0 : $startList-9;     // 현재 페이지의 마지막행 번호(floor)
$prePage=($totalPage==$curPage) ? 0 : $curPage+1;       // 이전 페이지(페이지 num의 절대값이 커짐)
$nextPage=($curPage==1) ? 0 : $curPage-1;               // 다음 페이지(페이지 num의 절대값이 작아짐)
$idx=$endList+1;                                      // 글 번호
// $totalBlock=ceil($totalPage/$pageBtNum);    // 총 블럭의 개수(총 페이지 수/총 버튼 수)
// $curBlock=ceil($curPage/$pageBtNum);        // 현재 블럭 번호(현재 페이지/)

// 게시글을 최신 순으로 받아오기
// limit : $startList으로부터 $listNum개의 데이터 반환
$boardSql=<<<SQL
select title, id, create_at, views, contents from board
order by create_at desc
limit $endList, $listNum
SQL;
$boardInfo=mysqli_query($db_conn, $boardSql);

// 하단 페이지 표시 부분 페이징 처리
// if($firstRow<$postSql){
//     // 현재 페이지의 첫 번째 행의 num이 총 게시글보다 작을 경우
// }//else if()

?>