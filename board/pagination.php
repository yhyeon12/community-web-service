<?php
require_once '/var/www/html/utils/conDB.php';
session_start();

// 변수 정의
$listNum=5;                             // 한 번에 조회되는 게시글의 수
$pageBtNum=3;                           // 한 번에 보여지는 페이지 버튼 수
$curPage=isset($_GET['page']) ? $_GET['page'] : 1; // 현재 페이지 위치
$firstRow=($curPage-1)*10;              // 현재 페이지의 첫 번째 글의 번호

// 게시글을 최신 순으로 받아오기
// limit : $postNum으로부터 $listNum개의 데이터 반환
$boardSql=<<<SQL
select title, id, create_at, views from board
order by create_at desc
limit $firstRow, $listNum
SQL;

// 총 게시글 수 구하기
$postSql="select count(*) from board";        // 총 게시글 수 조회 쿼리
$totalPost=mysqli_query($db_conn, $postSql);  // 쿼리 실행 및 총 게시글 수 저장

// 총 페이지 수 구하기
$totalPage=ceil($totalPost/$listNum);       // 총 페이지 수
$startList=($totalPage-$curPage)*10+($totalPost%10);    // 현재 페이지의 시작행 번호(top)
$endList=($totalPage==$curPage) ? 1 : $startList-9;     // 

// $totalBlock=ceil($totalPage/$pageBtNum);    // 총 블럭의 개수(총 페이지 수/총 버튼 수)
// $curBlock=ceil($curPage/$pageBtNum);        // 현재 블럭 번호(현재 페이지/)

// 하단 페이지 표시 부분 페이징 처리
if($firstRow<$postSql){
    // 현재 페이지의 첫 번째 행의 num이 총 게시글보다 작을 경우
}//else if()

?>