<?php

require_once '/var/www/html/utils/errorCheck.php';


$dir_path = "/var/www/html/uploads/";        // 파일이 위치한 폴더 경로
$file_name = isset($_GET['file']) ? $_GET['file'] : "";                // 파일명
$file_path = $dir_path.$file_name;
$file_size = filesize($file_path);
 
if (file_exists($file_path)) {
    header("Content-Type:application/octet-stream");
    header("Content-Disposition:attachment;filename={$file_name}");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:{$file_size}");
    header("Cache-Control:cache,must-revalidate");
    header("Pragma:no-cache");
    header("Expires:0");
 
    $fp = fopen($file_path, "r");
 
    while(!feof($fp)) {
        $buf = fread($fp, $file_size);
        $read = strlen($buf);
        print($buf);
        flush();
    }
 
    fclose($fp);
 
} else {
    die("파일이 존재하지 않습니다.");
}

?>