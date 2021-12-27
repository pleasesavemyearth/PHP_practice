<?php
require('header.php');
echo '이것은 메인페이지 입니다<br>';
echo '이것은 메인페이지 입니다<br>';
echo '이것은 메인페이지 입니다<br>';
echo htmlspecialchars('<script>alert("babo");</script>');
echo '<a href="main2.php">main2</a>';
require('footer.php');
?>