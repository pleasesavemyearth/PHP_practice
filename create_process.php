<?php
    // file_put_contents(파일경로, 입력할 내용)
    file_put_contents('data/' . $_POST['title'], $_POST['description']);

    // form을 submit후 사용자를 location으로 이동시킨다
    header('Location: /create.php?id=' . $_POST['title']);
?>