<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $chatlogin=$_REQUEST['chatlogin'];
  $chatid=$_REQUEST['chatid'];
 $password=$_REQUEST['password'];
 
  $sql  = "insert into messages(id,login,password) values ('$chatid','$chatlogin','$password')";
		  
		  if(mysql_query($sql))
		   echo '{"status":"inserted"}';
		else
		    echo '{"status":"insertfailed"}';
     ?>