
<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $user_type=$_REQUEST['usertype'];
	$email=$_REQUEST['user_mail'];
	
	
 
  if($user_type=="Student")
	  
{
	  $sql = "SELECT * FROM student_master WHERE student_email = '$email'";
	  $r=$row['student_contact'];
	   
  }
  elseif($user_type=="Parent")
  {
	  $sql = "SELECT * FROM parent_master WHERE parent_email = '$email'";
	  $r=$row['parent_contact'];
  }
  elseif($user_type=="Faculty")
  {
	   $sql = "SELECT * FROM faculty WHERE faculty_email = '$email'";
	    $r=$row['faculty_contact'];
  }
  elseif($user_type=="Alumni")
  {
	   $sql = "SELECT * from student_master sm inner join as_alumni_master am on sm.student_prn=am.student_prn  WHERE student_email = '$email'";
		$r=$row['student_contact'];
  }
 
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);
   
  if($user_type=="Student")
	  
{
	 
	  $r=$row['student_contact'];
	   
  }
  elseif($user_type=="Parent")
  {
	
	  $r=$row['parent_contact'];
  }
  elseif($user_type=="Faculty")
  {
	   
	    $r=$row['faculty_contact'];
  }
  elseif($user_type=="Alumni")
  {
		$r=$row['student_contact'];
  }
if(mysql_num_rows($result) == 1)
{
	echo '{"log":"userfound","Details":"'.$r.'"}';

	
}
else
{
	echo '{"log":"usernotfound"}';
	
}

?>