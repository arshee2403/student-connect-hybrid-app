<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $password=$_REQUEST['password'];
  $user_type=$_REQUEST['usertype'];
  $email=$_REQUEST['email'];
  $passhash=password_hash($password,PASSWORD_DEFAULT);
 
  
  
  if($user_type=="Student")
	  
{
	   $sql="update student_master set password ='$passhash' where student_email = '$email'";
       
	   
  }
  elseif($user_type=="Parent")
  {
	   $sql="update parent_master set password ='$passhash' where parent_email = '$email'";
	 
  }
  elseif($user_type=="Faculty")
  {
	   $sql="update faculty set password ='$passhash' where faculty_email = '$email'";
	  
  }
  elseif($user_type=="Alumni")
  {
	 $sql="update as_alumni_master am  inner join student_master sm  on sm.student_prn=am.student_prn set am.password='$passhash' where student_email='$email'";
	   
	 
  }
 
  if(mysql_query($sql))
		   echo('{"Status":"pswdsuccess"}');
		else
		    echo('{"Status":"pswdfailed"}');
 
		 





		 
     ?>