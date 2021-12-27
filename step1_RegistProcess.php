<?php
// 회원가입시 저장버튼 클릭했을 때 동작
// form에서 입력받은 username, password를 db에 저장할 것이다
// Pseudo code : 처리과정을 일상의 언어로 적어가는 것
/*
    1. POST방식으로 전달된 값을 취한다. $변수 = $POST[name];
    2. form validation 하고
    3. db 연결
    4. 중복체크를 위한 질의 구성
    5. 중복체크를 위한 질의 실행
    6.1. 중복계정이 있으면 중복메시지 출력 후 회원가입 폼으로 이동
    6.2. 중복계정이 없으면 다음단계 진행
    7. 질의어 구성(insert 구문)
    8. 구성된 질의어를 실행시킨다(mysql에 질의실행 요청) 결과를 돌려받는다
    9. login 화면으로 이동시킨다

*/
// 1. 
$username = $_POST['username'];
$password = $_POST['password'];

// 2.
if(empty($username) || empty($passowrd)) {
    echo ("<script>alert('유저명 또는 비밀번호가 공백입니다.');</script>");
    header('Location: step1_RegistForm.php');
}

// 3.
$hostname = 'localhost';
$user = 'webapp';
$pass = 'webapp';
$db = 'webdb';

$dbconn = mysqli_connect($hostname, $user, $pass, $db);

// 4.
$sql = "SELECT * FROM users WHERE username='" . $username . "'";

// 5.
$resultset = mysqli_query($dbconn, $sql);
$number = mysqli_num_rows($resultset); // resultset안에 몇개의 레코드가 있는지 숫자로 반환

// 6.1.
if($number > 0) {
    header('Location: step1_RegistForm.php');
} else{

// 6.2. 다음 단계로 진행

// 7.
$sql = "INSERT INTO users(username, userpwd) VALUES('". $username . "','" . $password . "')";
//$sql = "INSERT INTO users(username, userpwd) VALUES('". $username . "','" . "'" . $password . "')";

// 8.
$result = mysqli_query($dbconn, $sql);


// 9.
if($result) {
    header('Location: step1_LoginForm.php');
}


}
?>