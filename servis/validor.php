<?php
session_start();
$user=$_POST['user']; 
$clave=$_POST['clave']; 

if($user=="emanuel" and $clave=="golum5" or $user=="daniela" and $clave=="golum5"){ 

$_SESSION['user']=$user;
header("Location:index_rev.php");
}else{
header("Location:index.php");	
}
?>