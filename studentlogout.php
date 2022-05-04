<?php
if (isset($_COOKIE["loggedin"]) AND isset($_COOKIE["username"])){
$loggedin=$_COOKIE["loggedin"];
$name=$_COOKIE["username"];		
setcookie("loggedin", '$loggedin', time() - (6));
		setcookie("name", '$name', time() - (6));
	}
 
	header('location:index.html');
?>