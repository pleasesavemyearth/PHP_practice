<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>로그인</h3>
    <form action="step1_LoginProcess.php" method="POST">
        <label>USER NAME : </label><input type="text" name="username" placeholder="사용자명을 입력해주세요" /><br>
        <label>PASSWORD : </label><input type="text" name="password" placeholder="비밀번호를 입력해주세요" /><br>
        <input type="submit" value="로그인">
        <a href="step1_RegistForm.php">회원가입</a>


    </form>
</body>
</html>