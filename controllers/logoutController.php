<!-- 세션 만료 -->
 <?php
    
    session_start();
    session_unset();

    // 세션 만료
    session_destroy();


 ?>

 <script>
    alert("로그아웃 되었습니다.");
    location.replace('/views/login.php');
</script>