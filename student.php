<?php
require ('DB.php');
require ('validate.php');
require ('image.php');
class student extends DB
{
    use validate;
    use image;
    private $username;
    private $password;
    private $grade;
    private $gender;
    private $age;
    private $image;
    public $vali=[];
    function insert($username,$password,$grade,$age,$gender,$image){

        $this->username=$this->validation($username);
        $this->password=$this->validation($password);
        $this->grade=$this->validation($grade);
        $this->age=$this->validation($age);
        $this->image=$image;
        $this->gender=$gender;
        $this->image=$this->uplode_image($this->image,"image",$this->username);
      $this->vali=$this->validaite($username,$password,$grade,$age);
        if(count($this->vali)>0){
            $this->vali= json_encode($this->vali);
            return $this->vali;
        }


        elseif(count($this->vali)==0){
            $conn=$this->get_connect();
            $prep=$conn->prepare("INSERT INTO teacher (username,password,grade,age,gender,photo) VALUES(?,?,?,?,?,?)");
            $prp=$prep->execute([$this->username,$this->password,$this->grade,$this->age,$this->gender,$this->image]);
            header('location:list.blade.php');
        }


    }
    function showall(){
        $conn=$this->get_connect();
        $sele=$conn->query('select * from teacher');


        return $sele;

    }
    function delete($id){
        $conn=$this->get_connect();
        $delete=$conn->query("DELETE FROM teacher WHERE id='{$id}'");
    }
    function showsingle($id){
        $conn=$this->get_connect();
        $sele=$conn->query("select * from teacher where id='{$id}'");


        return $sele;

    }
    function validation($data){
        $data=trim($data);
        $data=htmlspecialchars($data);
        $data=stripslashes($data);
        return $data;
    }



}