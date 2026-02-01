<!-- 게시글 삭제 컨트롤러 -->

<?php
 require_once '/var/www/html/utils/errorCheck.php';

$idx=isset($_GET['idx']) ? $_GET['idx'] : "";
if($idx==""){
    exit();
}

require_once '/var/www/html/utils/conDB.php';

$fileCheckSql=<<<SQL
SELECT files From board
WHERE idx='$idx'
SQL;

$checkRes=mysqli_query($db_conn, $fileCheckSql);
$res=mysqli_fetch_assoc($checkRes);
if($res){
    $dir_path = "/var/www/html/uploads/";        
    $file_name = $res['files'];               
    $file_path = $dir_path.$file_name;
    unlink($file_path);
}

$deleteSql=<<<SQL
DELETE FROM board
WHERE idx='$idx'
SQL;

$deleteRes=mysqli_query($db_conn, $deleteSql);

header("Location: /board/list.php?success=3");

?>