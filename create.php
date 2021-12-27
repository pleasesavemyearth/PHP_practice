<?php // <게시글 작성하고 create_process를 통해 게시글 생성된 후 리다이렉션받기>
 function print_title() { // id가 맞으면 id불러오고 그렇지 않으면 welcome출력
     if(isset($_GET['id'])) { 
         echo htmlspecialchars($_GET['id']);
     } else {
         echo "welcome";
     }
 }

 function print_description() { // id가 맞으면 data폴더에서의 id에 맞는 data값 불러오고 그렇지 않으면 hello, php출력(즉, web일대 hello, php 출력)
     if(isset($_GET['id'])) {
         echo htmlspecialchars(file_get_contents("data/" . $_GET['id']));
     } else {
         echo "hello, php";
     }
 }

 function print_list() { // data폴더에 data추가하면 자동으로 페이지에 동적으로 ol태그에
     $list = scandir('./data');
     $i = 0;
    while($i < count($list)) {
        $title = htmlspecialchars($list[$i]);
        if($list[$i] != '.') {
            if($list[$i] != '..') {
                echo "<li><a href=\"create.php?id=$title\">$title</a></li>\n";
            }
        }
        $i = $i + 1;
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 
        <?php
            // 타이틀 이름 변경됨 
            print_title();
        ?>
    </title>
</head>
<body>
    <h1><a href="ex02.php">web</a></h1>

    <ol> <!-- 1,2,3.. 항목생성 -->
        <?php
            print_list();
        ?>
    </ol>

    <!-- update, delete a태그 -->
    <a href="create.php">create</a>
    <?php if(isset($_GET['id'])) { ?>
        <a href="update.php?id=<?= $_GET['id']; ?>">update</a>
        <form action="delete_process.php" method="post">
            <input type="hidden" name="id" value=<?= $_GET['id']?> />
            <input type="submit" value="delete" />
        </form>
        <!-- <a href="delete_process.php?id=<?= $_GET['id']; ?>">delete</a> -->
    <?php } ?>

    

    <form action="create_process.php" method="post"> <!--action을 사용하여 폼에 작성된 내용을 create_process.php에게 post법으로 전송-->
        <p>
            <input type="text" name="title" placeholder="Title" />
        </p>
        <p>
            <textarea name="description" placeholder="Description"></textarea>
        </p>
        <p>
            <input type="submit" value="submit" /> <!-- 전송 버튼 -->
        </p>
    </form>


    <h2> <!-- ol에서 선택하면 밑으로 변경되면서 동적 페이지 실행되는 부분 -->
        <?php
            print_title();
        ?>
    </h2>

        <?php
            print_description();
        ?>

</body>
</html>