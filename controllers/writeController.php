<!-- 작성한 게시글 업로드 컨트롤러 -->
 <?php
     require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - 글 내용 전달
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $title=$_POST["title"];
        $content=$_POST["content"];
    }
 
    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';
 
    $sql=<<<SQL
    insert into board(title, id, create_at, views, contents)
    values('$title', '$_SESSION[username]', NOW(), 0, '$content')
    SQL;

    $updateBoard=mysqli_query($db_conn, $sql);
    header("Location: /board/list.php?success=2");

 ?>