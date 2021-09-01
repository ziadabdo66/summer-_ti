<?php
$conn=new pdo("mysql:host=localhost;dbname=students","root","");
$ids=$_GET["id"];
if(!$conn){echo "not connect";}
$sele=$conn->query("select * from teacher where id='{$_GET["id"]}'");
$row=$sele->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE>
<html>
<head>
    <title>Title</title>
</head>
<body>
<form action="pp1.php" method="post">
    username:<input type="text" name="username" value="<?php echo $row['username']?>"><br>
    password:<input type="text" name="pass" value="<?php echo $row['password']?>"><br>
    age:<input type="text" name="age" value="<?php echo $row['age']?>">
    grade:<input type="text" name="grade" value="<?php echo $row['grade']?>">
    <input type="hidden" name="idd" value="<?php echo $row['id']?>">

    <input type="submit" name="edit">

</form>

</body>
</html>