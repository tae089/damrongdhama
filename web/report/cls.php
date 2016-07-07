<?php

class connect_base
{
private $database;
private $host;
private $user;
private $password;

function __construct() {
       $this->host="localhost";
	   $this->user="root";
	   $this->password="P@ssw0rd@udoncity";
	//   $this->password="ickc778b";
	   $this->database="school06";
   }

function connect(){
   mysql_connect($this->host,$this->user,$this->password);mysql_query("SET NAMES UTF8");
   mysql_select_db($this->database);
   //date_default_timezone_set("Asia/Bangkok");
}

}



?>