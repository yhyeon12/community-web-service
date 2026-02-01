<!-- 작성한 게시글 업로드 컨트롤러 -->
 <?php
     require_once '/var/www/html/utils/errorCheck.php';

    session_start();

    // POST인 경우 - 글 내용 전달
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $title=$_POST["title"];
        $content=$_POST["contents"];
        $file=isset($_FILES['myfile'])? "Upload" : "";
    }
    // 파일 업로드
    if($file=="Upload"){
        $uploaded_file_name_tmp = $_FILES[ 'myfile' ][ 'tmp_name' ];
        $uploaded_file_name = $_FILES[ 'myfile' ][ 'name' ];
        $upload_folder = "/var/www/html/uploads";

        move_uploaded_file( $uploaded_file_name_tmp, $upload_folder ."/".$uploaded_file_name );
    }else{
        $uploaded_file_name="";
    }
 
    // DB연결 정보 정의(절대 경로 사용할 것)
    require_once '/var/www/html/utils/conDB.php';
 
    $sql=<<<SQL
    insert into board(title, id, create_at, views, contents, files)
    values('$title', '$_SESSION[username]', NOW(), 0, '$content', '$uploaded_file_name')
    SQL;

    $updateBoard=mysqli_query($db_conn, $sql);
    header("Location: /board/list.php?success=2");

 ?>