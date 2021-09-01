
<?php
$conn=new pdo("mysql:host=localhost;dbname=students","root","");
if(!$conn){echo "not connect";}
    session_start();
    $id= $_SESSION['id'];
$sele=$conn->query("select * from teacher where id='{$id}' ");
$sele=$sele->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE>
<html>
<head>
    <title>Title</title>
</head>
<body>
welcome <?php echo $sele['username'];?> <br>
your age is <?php echo $sele['age'];?><br>
your grade is <?php echo $sele['grade'];?>



</body>
</html>