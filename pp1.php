

<?php

if(isset($_POST['send'])){
    $conn=new pdo("mysql:host=localhost;dbname=students","root","");
    if(!$conn){echo "not connect";}
    $username = validate($_POST['username']);
    $paassword = $_POST['pass'];
    $grade = validate($_POST['grade']);
    $age = validate($_POST['age']);
    $gende=$_POST['gender'];
$image=$_FILES['image'];
    $imagename=$image['name'];
    $tmpname=$image['tmp_name'];
    $ex=pathinfo($imagename,PATHINFO_EXTENSION);
    $new_image=$username.time().".".$ex;
    $x=1;

    if (!filter_var($age, FILTER_VALIDATE_INT)  ) {
        $erroe['age'] = "you should enter num";
        $x = 0;
    }
    if(!filter_var($grade, FILTER_VALIDATE_INT)){
        $erroe['grade'] = "you should enter num";
        $x = 0;
    }
    if (strlen($username) < 6 ) {
        $erroe['username'] = "you should enter username more than 6";
        $x = 0;
    }
      if ( strlen($paassword) < 6) {
        $erroe['password'] = "you should password enter more than 6";
        $x = 0;
    }

     if ($x == 1) {
         move_uploaded_file($tmpname,"image/".$new_image);
        $prep=$conn->prepare("INSERT INTO teacher (username,password,grade,age,gender,photo) VALUES(?,?,?,?,?,?)");
        $prp=$prep->execute([$username,$paassword,$grade,$age,$gende,$new_image]);
        if ($prp){
            header('location:list.blade.php');
        }

    }
    else{
        $erroe=json_encode($erroe);
        header("location:index.blade.php?eror=$erroe");}


}
else{
    echo "none";

}
if(isset($_POST['edit'])) {
    $conn = new pdo("mysql:host=localhost;dbname=students", "root", "");
    if (!$conn) {
        echo "not connect";
    }

    $username = validate($_POST['username']);
    $paassword = $_POST['pass'];
    $grade = validate($_POST['grade']);
    $age = validate($_POST['age']);
    $x = 0;
    $erroe = [];
    if (!filter_var($age, FILTER_VALIDATE_INT) and !filter_var($grade, FILTER_VALIDATE_INT)) {
        $erroe['num'] = "you should enter num";
        $x = 0;
    }
    if (strlen($username) < 6 and strlen($paassword) < 6) {
        $erroe['length'] = "you should enter more than 6";
        $x = 0;
    }
    if (strlen($username) == 0 and strlen($paassword) == 0 and strlen($grade) == 0 and strlen($age) == 0) {
        $erroe['require'] = "you should require it";
        $x = 0;
    } elseif ($x == 1) {

        $prep = $conn->query("update  teacher set username='{$username}',password='{$paassword}',grade='{$grade}',age='{$age}' where id='{$_POST['idd']}'");

        if ($prep) {
            header('location:list.blade.php');
        }
        else {
            echo "not done";
        }
        }

    else {
            echo "none";

        }

}
function validate($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;
}
