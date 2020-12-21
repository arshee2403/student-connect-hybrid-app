<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $not_title=$_REQUEST['not_title'];
  $not_body=$_REQUEST['not_body'];
  $student_email=$_REQUEST['student_email'];
 $parent_email=$_REQUEST['parent_email'];
 $filename=$_REQUEST['filename'];
  $batch=$_REQUEST['batch'];
   $noti_usertype=$_REQUEST['noti_usertype'];
    $course=$_REQUEST['course'];
	 $faculty_name=$_REQUEST['faculty_name'];
   $noti_valid=$_REQUEST['noti_valid'];
   
  $sql  = "insert into notification(notification_header,notification_body,parent_id,student_prn,course_id,batch,other_uploads,user_type,uploaded_by,notification_valid_till_date,notification_date,notification_time) values 
  ('$not_title','$not_body','$parent_email', '$student_email','$course','$batch','$filename','$noti_usertype','$faculty_name','$noti_valid','2019-04-04','3:00:00')";
		  
		  if(mysql_query($sql))
		   echo '{"status":"inserted"}';
		else
		    echo '{"status":"insertfailed"}';
     ?> 