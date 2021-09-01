
<?php
    if (isset($_POST['send'])){
        $username=$_POST["username"];
        $password=$_POST["pass"];
        echo $password;
        $conn=new pdo("mysql:host=localhost;dbname=students","root","");
        if(!$conn){echo "not connect";}
        $sele=$conn->query("select * from teacher where username='{$username}' and  password='{$password}'");
        $sele=$sele->fetch(PDO::FETCH_ASSOC);
        if($sele){

            session_start();
            $_SESSION['id']=$sele['id'];
            echo  $_SESSION['id'];
            header('location:welcome.blade.php');

        }
        else{
            header('location:login.blade.php');
        }
    }

?>
<!DOCTYPE>
<html>
<head>
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    username:<input type="text" name="username"></span><br>
    password:<input type="text" name="pass"></span><br>
    <input type="submit" name="send">

</form>

</body>
</html>