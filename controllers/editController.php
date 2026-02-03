 <?php
     require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $idx=$_POST["idx"];
        $title=$_POST["title"];
        $content=$_POST["contents"];
    }
 
    require_once '/var/www/html/utils/conDB.php';

    $sql=<<<SQL
    UPDATE board SET title='$title', contents='$content'
    WHERE idx='$idx';
    SQL;

    $updateBoard=mysqli_query($db_conn, $sql);
    header("Location: /board/read.php?postingInfo=$idx");

 ?>