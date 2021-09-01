
<?php
    require('student.php');
if(isset($_POST['send'])){
$username = $_POST['username'];
$paassword = $_POST['pass'];
$grade = $_POST['grade'];
$age = $_POST['age'];
$gende=$_POST['gender'];
$image=$_FILES['image'];
$stu=new student();
$eror=$stu->insert($username,$paassword,$grade,$age,$gende,$image);
$eror=json_decode($eror);

}
?>
<!DOCTYPE>
<html>
<head>
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    username:<input type="text" name="username"><span><?php if(isset($eror->username)) echo $eror->username; ?></span><br>
    password:<input type="text" name="pass"><span><?php if(isset($eror->password)) echo $eror->password; ?></span><br>
    age:<input type="text" name="age"><span><?php if(isset($eror->age)) echo $eror->age; ?></span><br>
    grade:<input type="text" name="grade"><span><?php if(isset($eror->grade)) echo $eror->grade; ?></span>
    male<input value="1" type="radio" name="gender">
    female<input  value="2" type="radio" name="gender"><br>
    <input type="file" name="image">
    <input type="submit" name="send">

</form>

</body>
</html>