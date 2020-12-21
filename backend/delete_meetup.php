<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $id=$_REQUEST['id'];
 
 
  $sql  = "delete from meetup where meetup_id='$id'";
		  
		  if(mysql_query($sql))
		   echo '{"status":"deleted"}';
		else
		    echo '{"status":"failed"}';
     ?>