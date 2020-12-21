<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $querydetail=$_REQUEST['querydetail'];
  $id=$_REQUEST['id'];
 
 $date=date('d-m-Y');
  $sql  = "insert into query (student_prn,query_about,query_date) values ('$id','$querydetail',$date)";
		  
		  if(mysql_query($sql))
		   echo '{"status":"inserted"}';
		else
		    echo '{"status":"insertfailed"}';
     ?>