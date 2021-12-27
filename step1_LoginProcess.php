<?php
// Pseudo code : 처리과정을 일상의 언어로 적어가는 것
/*
    1. POST방식으로 전달된 값을 취한다. $변수 = $POST[name];
    2. Form validation 진행(여기서는 전달된 값이 공백이면 입력 요청한다.)
    3. db 연결
    4. 질의어 구성
    5. 구성된 질의어를 실행시킨다(mysql에 질의를 던진다(요청한다))
    5. 실행 결과를 돌려받는다.
    6.1. 결과를 확인하고 레코드가 존재하면 로그인 성공, 페이지로 이동
    6.2. 레코드가 존재하지 않으면 로그인실패, 폼화면으로 이동
*/

    // 1.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 2. 사용자명 또는 비밀번호 중 하나라도 입력되지 않으면
    // 다시 로그인폼 화면으로 돌려보낸다.
    if(empty($username) || empty($password)) {
        echo "<script>alert('사용자명 또는 비밀번호를 입력해주세요');</script>";
        header('Location: step1_LoginForm.php');
    }

    // 3. db 연결
    $host = 'localhost';
    $user = 'webapp';
    $pass = 'webapp';
    $db = 'webdb';
    // $dbconn = mysqli_connect(호스트명, 사용자명, 비밀번호, db);
    $dbconn = mysqli_connect($host, $user, $pass, $db);
    if(is_null($dbconn)) {
        echo "db 연결에 문제 발생";
    }

    // 4. sql 구성
    $sql = "SELECT userpwd FROM users WHERE username='".$username."'";

    // 5. 실행하고 결과 돌려받기
    $resultset = mysqli_query($dbconn, $sql);

    // 6.
    while($row = mysqli_fetch_array($resultset)) {
        if( $password == $row['userpwd']) {
            header('Location: step1_LoginSucces.php');
        } else {
            echo '비밀번호가 틀렸습니다';
            header('Location: step1_LoginForm.php');
        }
    }

?>