<?php
    
    require_once '/var/www/html/utils/errorCheck.php';
    require_once '/var/www/html/utils/authGuard.php';

    $error = isset($_GET['error']) ? $_GET['error'] : "";
    $success = isset($_GET['success']) ? $_GET['success'] : "";

    require_once '/var/www/html/utils/conDB.php';

    $sql="select * from userDB where id='".$name."'";
    $veriInfo = mysqli_query($db_conn, $sql);
    $rowInfo = mysqli_fetch_array($veriInfo);
?>

<!DOCTYPE html>
<html lang="ko">
    
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/mypage.css">
        <title> mypage </title>
    </head>

    <body>
        <?php include "/var/www/html/views/menu.php"; ?>

    
        <div class="align-btn">
        <h1>MY PAGE</h1>
        <h2>~(ᵕ ̫  ᵕ ~) 회원 정보 (~ ᵕ ̫ ᵕ)~</h2>
        <p>이름 : <b><?php echo htmlspecialchars($name); ?></b></p> 
        <p>이메일 : <b><?php echo htmlspecialchars($rowInfo['mailAddr']); ?></b></p> 


        <button id="btn_toggle" class="custom-btn btn-1 locate-btn"> 비밀번호 변경 </button>
        <div id="Toggle" style="display:none">
        <form method="POST" class="updatePwd" action="/controllers/updatePwdController.php">
            <h2> 비밀번호 변경 </h2>
            <input type="hidden" name="userId" value="<?php echo htmlspecialchars($name); ?>"></input>
            <input type="password" name="oldPwd" placeholder="기존 비밀번호"></input>
            <input type="password" name="newPwd" placeholder="새로운 비밀번호"></input>
            <button class="custom-btn btn-1 locate-btn" type="submit">SUBMIT</button>
        </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(function (){
                $("#btn_toggle").click(function (){
                    $("#Toggle").toggle();
                });
            });
        </script>

        </div>

        <?php if($success): 
            echo '<script>alert("비밀번호가 성공적으로 수정되었습니다.")</script>';
        endif; ?>
        <?php if($error==1): 
            echo '<script>alert("비밀번호 변경 실패. 비밀번호가 일치하지 않습니다.")</script>';
        endif; ?>
        <?php if($error==3): 
            echo '<script>alert("비밀번호를 4자 이상 입력해주세요.")</script>';
        endif; ?>

    </body>
</html>