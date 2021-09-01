<?php
require('student.php');
$ids=$_GET["id"];
$stu=new student();
$sele=$stu->showsingle($ids);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Title</title>
</head>
<body>
<table border="1">
    <tr><td>username</td><td>password</td><td>grade</td><td>age</td><td>gender</td></tr>
    <?php

    while ($row=$sele->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "<td>{$row['grade']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td>{$row['gender']}</td>";

        echo "<td><button href='edit.php?{$row['id']}'> edit</button></td>";
        echo "<td><button href='delete.php?{$row['id']}'> delete</button></td>";
        echo '</tr>';


    }
    ?>

</table>

</body>
</html>