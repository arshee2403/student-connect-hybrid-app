
<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $user_type=$_REQUEST['usertype'];
	$email=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	
  if($user_type=="Student")
	  
{
	  $sql = "SELECT * FROM student_master WHERE student_email = '$email' ";
	
	   
  }
  elseif($user_type=="Parent")
  {
	  $sql = "SELECT * FROM parent_master WHERE parent_email = '$email' ";
  }
  elseif($user_type=="Faculty")
  {
	   $sql = "SELECT * FROM faculty WHERE faculty_email = '$email' ";
  }
  elseif($user_type=="Alumni")
  {
	   $sql = "SELECT * from student_master sm inner join as_alumni_master am on sm.student_prn=am.student_prn  WHERE sm.student_email = '$email' ";
  }
 
  $result = mysql_query($sql);
if(mysql_num_rows($result) == 1)
{
	
	$row = mysql_fetch_array($result); 
		$password_hash=$row['password'];

		if (password_verify($password,$password_hash))
		{
			echo '{"status":"login"}';

	}
else
{
	echo '{"status":"logInFailed"}'; 
	
}
	

} 


?> 