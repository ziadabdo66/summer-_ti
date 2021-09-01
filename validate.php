<?php


trait validate
{
function validaite($username,$paassword,$grade,$age){

    $erroe = [];
    if (!filter_var($age, FILTER_VALIDATE_INT)  ) {
        $erroe['age'] = "you should enter num";

    }
    if(!filter_var($grade, FILTER_VALIDATE_INT)){
        $erroe['grade'] = "you should enter num";

    }
    if (strlen($username) < 6 ) {
        $erroe['username'] = "you should enter username more than 6";

    }
    if ( strlen($paassword) < 6) {
        $erroe['password'] = "you should password enter more than 6";

    }
   return $erroe;
    }

}