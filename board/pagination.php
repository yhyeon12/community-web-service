<?php
require_once '/var/www/html/utils/conDB.php';

$listNum=10;                            
$pageBtNum=3;                          
$curPage=isset($_GET['page']) ? $_GET['page'] : 1; 

$postSql="select count(*) from board";        
$postDB=mysqli_query($db_conn, $postSql);     
$postRow=mysqli_fetch_row($postDB);         
$totalPost=$postRow[0];                      

$totalPage=ceil($totalPost/$listNum);                
$startList=($curPage-1)*$listNum;   
$endList=($totalPage==$curPage) ? $totalPost : $startList+9;     
$nextPage=($totalPage==$curPage) ? $curPage : $curPage+1;      
$prePage=($curPage==1) ? 1 : $curPage-1;             
$idx=($curPage-1)*$listNum+1;                  
$curPostNum=$endList-$startList+1;                      

$boardSql=<<<SQL
select title, id, create_at, views, contents, idx from board
order by create_at desc
limit $startList, $curPostNum
SQL;
$boardInfo=mysqli_query($db_conn, $boardSql);

?>