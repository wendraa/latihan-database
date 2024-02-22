<?php

$host="localhost";
$user="root";
$password="";
$db="UTS_Muhammad_Ruswendra";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>