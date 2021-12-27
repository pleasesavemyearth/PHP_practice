<?php
    // 파일 제목 변경
    rename('data/' . $_POST['old_title'], 'data/' . $_POST['title']);

    // 파일 내용 변경
    file_put_contents('data/' . $_POST['title'], $_POST['description']);

    // 리다이렉션
    header('Location: /create.php?id=' . $_POST['title']);
?>