<?php


trait image
{
function uplode_image($image,$file,$username)
{
    $imagename=$image['name'];
    $tmpname=$image['tmp_name'];
    $ex=pathinfo($imagename,PATHINFO_EXTENSION);
    $new_image=$username.time().".".$ex;
    move_uploaded_file($tmpname,$file."/".$new_image);
    return $new_image;

}
}