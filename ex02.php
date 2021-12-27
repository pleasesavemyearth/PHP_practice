<?php
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
                echo "<li><a href=\"ex02.php?id=$title\">$title</a></li>\n"; //이게머더라
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