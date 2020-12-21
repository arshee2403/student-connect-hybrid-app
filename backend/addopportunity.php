<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $alumni_id=$_REQUEST['alumni_id'];
  $post=$_REQUEST['post'];
  $company=$_REQUEST['company'];
  $job_title=$_REQUEST['job_title'];
  $deadline=$_REQUEST['deadline'];
  $location=$_REQUEST['location'];
  $salary=$_REQUEST['salary'];
  $contact=$_REQUEST['contact'];
  $details=$_REQUEST['details'];
 
  $sql  = "insert into opportunities(alumni_id,company_name,type,location,salary,deadline,other_details,job_title,contact) values ('$alumni_id','$company', '$post', '$location','$salary','$deadline', '$details', '$job_title','$contact')";
		  
		  if(mysql_query($sql))
		   echo '{"status":"inserted"}';
		else
		    echo '{"status":"insertfailed"}';
     ?>