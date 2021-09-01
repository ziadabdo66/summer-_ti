

<?php
require('student.php');


    $ids=$_GET["id"];
   $dele=new student();
   $dele->delete($ids);

    header('location:list.blade.php');


