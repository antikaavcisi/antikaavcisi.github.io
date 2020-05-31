<?php
$host="localhost:3306";
$username="root";
$password="";
$database="muzayede";
  try 
  {
	 $db = new PDO("mysql:host=".$host.";dbname=".$database.";", $username, $password);    
	 $db->query("SET NAMES utf8");
	 $db->query("SET CHARACTER SET uf8"); 
  } 
  catch ( PDOException $e )
  {
	 print $e->getMessage();
	 die();
  }
?>