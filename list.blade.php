<?php
require('student.php');
$stu=new student();
$sele=$stu->showall();

?>
<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Title</title>
</head>
<body>
<table border="1">
    <tr><td>username</td><td>password</td><td>grade</td><td>age</td><td>gender</td></tr>
    <?php


    while ( $row =$sele->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "<td>{$row['grade']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td><img src='image/{$row['photo']}' ></td>";
        echo "<td><a href='view.blade.php?id={$row['id']}'> view</a></td>";
        echo "<td><a href='edit.blade.php?id={$row['id']}'> edit</a></td>";
        echo "<td><a href='delete.php?id={$row['id']}'> delete</a></td>";
        echo '</tr>';



    }
        ?>

</table>

</body>
</html>