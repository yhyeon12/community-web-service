<!-- 게시글 삭제 컨트롤러 -->

<?php

$idx=isset($_GET['idx']) ? $_GET['idx'] : "";
if($idx==""){
    exit();
}

require_once '/var/www/html/utils/conDB.php';

$deleteSql=<<<SQL
DELETE FROM board
WHERE idx='$idx'
SQL;

$deleteRes=mysqli_query($db_conn, $deleteSql);

header("Location: /board/list.php?success=3");

?>