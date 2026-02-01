<!-- 작성한 게시글 업로드 컨트롤러 -->
 <?php
     require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - 글 내용 전달
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $idx=$_POST["idx"];
        $title=$_POST["title"];
        $content=$_POST["contents"];
    }
 
    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';

    $sql=<<<SQL
    UPDATE board SET title='$title', contents='$content'
    WHERE idx='$idx';
    SQL;

    $updateBoard=mysqli_query($db_conn, $sql);
    header("Location: /board/read.php?postingInfo=$idx");

 ?>