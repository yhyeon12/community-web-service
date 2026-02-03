 <?php
     require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $title=$_POST["title"];
        $content=$_POST["contents"];
        $file=isset($_FILES['myfile'])? "Upload" : "";
    }
    if($file=="Upload"){
        $uploaded_file_name_tmp = $_FILES[ 'myfile' ][ 'tmp_name' ];
        $uploaded_file_name = $_FILES[ 'myfile' ][ 'name' ];
        $upload_folder = "/var/www/html/uploads";

        move_uploaded_file( $uploaded_file_name_tmp, $upload_folder ."/".$uploaded_file_name );
    }else{
        $uploaded_file_name="";
    }
 
    require_once '/var/www/html/utils/conDB.php';
 
    $sql=<<<SQL
    insert into board(title, id, create_at, views, contents, files)
    values('$title', '$_SESSION[username]', NOW(), 0, '$content', '$uploaded_file_name')
    SQL;

    $updateBoard=mysqli_query($db_conn, $sql);
    header("Location: /board/list.php?success=2");

 ?>