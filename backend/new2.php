<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $user_type=$_REQUEST['usertype'];
	$email=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	
  if($user_type=="Student")
	  
{
	  $sql = "SELECT * FROM student_master sm inner join course c where sm.c_id=c.course_id and student_email='$email' ";
	   $result = mysql_query($sql);
	if(mysql_num_rows($result) == 1)
	{
	
		$row = mysql_fetch_array($result); 
		$password_hash=$row['password'];
		$r=$user_type."-".$row['student_prn']."-".$row['student_name']."-".$row['student_email']."-".$row['batch']."-".$row['course_name'];
		if (password_verify($password,$password_hash))
		{
			
			echo '{"status":"login","Details":"'.$r.'"}';

		}
		else
{
	echo '{"status":"logInFailed"}';
	
}
	
	   
	}
	else{
		echo '{"status":"logInFailed"}';
	}
}
  elseif($user_type=="Parent")
  {
	  $sql = "SELECT * FROM parent_master WHERE parent_email = '$email' ";
	   $result = mysql_query($sql);
if(mysql_num_rows($result) == 1)
{
	
	$row = mysql_fetch_array($result); 
		$password_hash=$row['password'];
$r=$user_type."-".$row['parent_id']."-".$row['parent_email']."-".$row['parent_name'];
		if (password_verify($password,$password_hash))
		{
			
			echo '{"status":"login","Details":"'.$r.'"}';

	}
	else
{
	echo '{"status":"logInFailed"}'; 
	
}
  }
  else{
		echo '{"status":"logInFailed"}';
	}
  }
  elseif($user_type=="Faculty")
  {
	   $sql = "SELECT * FROM faculty sm inner join course c where sm.course_id=c.course_id and faculty_email='$email' ";
	    $result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
		{
	
			$row = mysql_fetch_array($result); 
			$password_hash=$row['password'];
			$r=$user_type."-".$row['faculty_id']."-".$row['course_name']."-".$row['faculty_name']."-".$row['faculty_email'];
			
			if (password_verify($password,$password_hash))
			{
			
				echo '{"status":"login","Details":"'.$r.'"}';

			}
			else
{
	echo '{"status":"logInFailed"}'; 
	
}
			
		}
		else{
		echo '{"status":"logInFailed"}';
	}
  }
  elseif($user_type=="Alumni")
  {
	   $sql = "SELECT * from student_master sm inner join as_alumni_master am on sm.student_prn=am.student_prn inner join course c  WHERE sm.student_email = '$email' and c.course_id=sm.c_id ";
	    $result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
		{
	
			$row = mysql_fetch_array($result); 
			$password_hash=$row['password'];
			$r=$user_type."-".$row['student_prn']."-".$row['student_email']."-".$row['alumni_id']."-".$row['course_name']."-".$row['batch']."-".$row['student_name'];
				if (password_verify($password,$password_hash))
				{
			
				echo '{"status":"login","Details":"'.$r.'"}';

				}
				else
{
	echo '{"status":"logInFailed"}'; 
	
}
		}
		else{
		echo '{"status":"logInFailed"}';
	}
 
  }

	




?>