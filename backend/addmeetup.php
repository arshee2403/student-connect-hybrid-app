<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $meetup_date=$_REQUEST['meetup_date'];
  $meetup_venue=$_REQUEST['meetup_venue'];
  $meetup_time=$_REQUEST['meetup_time'];
 $batch=$_REQUEST['batch'];
 $alumni_id=$_REQUEST['alumni_id'];
 
  $sql  = "insert into meetup (alumni_id,meetup_date, meetup_venue, meetup_time,batch) values ('$alumni_id','$meetup_date', '$meetup_venue', '$meetup_time','$batch')";
		  
		  if(mysql_query($sql))
		   echo '{"status":"inserted"}';
		else
		    echo '{"status":"insertfailed"}';
     ?>