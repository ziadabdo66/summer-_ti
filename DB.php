<?php


class DB
{
   private $host="localhost";
   private $dbname="students";
   private $root="root";
   private $connection;
   function __construct()
   {
       $this->connection=new pdo("mysql:host=$this->host;dbname=$this->dbname", "$this->root", "");
   }
   function get_connect(){
     return $this->connection;
   }



}