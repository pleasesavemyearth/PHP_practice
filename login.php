<?php
namespace loginex;
// form에 입력이 있을 때 처리 진행
if(!is_null($_POST)){
    $input_username = $_POST['userName'];
    $input_password = $_POST['password'];
}
if(!is_null($input_username)) { 
    echo "[DBG]폼에 입력된 항목이 있네요.";
    // 필요한 작업 내용을 pseudo code 로 표현
    // db 와 연결(=get connecting)
    require_once '/util/Dbutil.php';
    // 질의 구성. id 와 password 를 만족하는 항목이 있는지 확인
    // 질의 실행.
    // 실행한 결과 해당 항목이 있으면 => 로그인 성공, 성공페이지로 이동
    // 실행한 결과 해당 항목이 없으면 => 로그인 실패, 다시 로그인페이지로 이동 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="formUser" method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <label>User Name : </label>
        <input type="text" name="userName" placeholder="input username"/><br>

        <label>Password : </label>
        <input type="password" name="password" placeholder="input password"/><br>
    
        <input type="submit" value="Login"/>
    </form>
</body>
</html>