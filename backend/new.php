<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");


$query = "select * from as_achievement order by achievement_id desc";

$result = mysql_query($query);
$row = mysql_fetch_array($result);
$id=$row[achievement_id];
echo('hvsjh'.$id);
		
		
	

?>


         
         
