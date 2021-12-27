<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .error {color: red;}
</style>
</head>
<body>

<?php
// 변수 선언하고 빈값 채우기
$idErr = $passwordErr = $nameErr = $nummberErr = $emailErr = "";
$id = $password = $name = $nummber = $email = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["id"])) { // 대문자 숫자 동시에 포함하고 8자이상
        $idErr = "id를 입력해주세요";
    } else {
        $id = test_input($_POST["id"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $id)) {
            $idErr = "1개 이상의 대문자, 숫자를 포함해 8글자 이상이어야 합니다";
        }
    }

    if (empty($_POST["password"])) { // "
        $passwordErr = "password를 입력해주세요";
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
            $passwordErr = "1개 이상의 대문자, 숫자를 포함해 8글자 이상이어야 합니다";
        }
    }

    if (empty($_POST["name"])) { // 1글자 이상, 4글자 이하 되게
        $nameErr = "이름을 입력해주세요";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[가-힣]{1,4}*$/", $name)) { // {m,n}
            $nameErr = "한글 1글자 이상 4글자 이하만 가능합니다";
        }
    }

    if (empty($_POST["nummber"])) { // 안됌, number오타
        $nummberErr = "번호를 입력해주세요";
    } else {
        $nummber = test_input($_POST["nummber"]);
        if (!preg_match("/^\d{3}-\d{4}-\d{4}*$/", $nummber)) { 
            $idErr = "숫자만 가능합니다";
        }
    }

    if(empty($_POST["email"])) {
        $emailErr = "이메일을 입력해주세요";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "올바르지 않은 이메일 형식입니다";
        }
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <h2>Form validation</h2>
    <p><span class="error">* require field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    ID : <input type="text" name="id" value="<?php echo $id;?>">
    <span class="error">* <?php echo $idErr;?></span><br><br>

    password : <input type="password" name="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr;?></span><br><br>

    name : <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span><br><br>

    nummber : <input type="text" name="nummmber" value="<?php echo $nummber;?>">
    <span class="error">* <?php echo $nummberErr;?></span><br><br>

    email : <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span><br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php
// 입력한 결과 나타냄
echo "<h2>Your Input:</h2>";
echo "아이디 : " . $id;
echo "<br>";
echo "비밀번호 : ". $password;
echo "<br>";
echo "이름 : ". $name;
echo "<br>"; 
echo "번호 : ". $nummber;
echo "<br>";
echo "이메일 : ". $email;
?>

</body>
</html>