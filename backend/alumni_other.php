<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $current_status=$_REQUEST['current_status'];
  $qualification=$_REQUEST['qualification'];
 $work_experience=$_REQUEST['work_experience'];
 $alumni_id=$_REQUEST['alumni_id'];
 
  $sql  = "update as_alumni_master set alumni_degree='$current_status',alumni_qualification='$qualification',alumni_workexperience='$work_experience' where alumni_id=' $alumni_id'";
		  
		  if(mysql_query($sql))
		   echo '{"status":"updated"}';
		else
		    echo '{"status":"failed"}';
     ?>