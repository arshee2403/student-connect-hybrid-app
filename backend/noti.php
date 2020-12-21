<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
$user_type=$_REQUEST['user_type']; 
	$parent_email=$_REQUEST['parentemail'];
	$student_email=$_REQUEST['studentemail'];
	$faculty_email=$_REQUEST['facultyemail'];
	$alumni_email=$_REQUEST['alumniemail'];
	$student_batch=$_REQUEST['studentbatch'];
	$student_course=$_REQUEST['studentcourse'];  


 if($user_type=="Parent")
  {
	  $query ="select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and user_type like '%$user_type%'";
	  $query3 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  parent_id like '%$parent_email%' order by notification_id desc";
  }
    elseif($user_type=="Faculty")
	{
		$query ="select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and user_type like '%$user_type%'";
		$query3 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  faculty_id like '%$faculty_email%' order by notification_id desc";
	}
	elseif($user_type=="Alumni")
	{ 
$query ="select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and user_type like '%$user_type%'";	
$query3 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  alumni_id like '%$alumni_email%' order by notification_id desc";
	}
	elseif($user_type=="Student")
{

$query = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and course_id ='null' and batch='null'  and user_type like '%$user_type%' order by notification_id desc";
$query1 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  course_id like '%$student_course%' and batch like '%$student_batch%'  order by notification_id desc";
$query2 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  course_id like '%$student_course%' and batch='null'  order by notification_id desc";
$query3 = "select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and  student_prn like '%$student_email%' order by notification_id desc";

}
	$result = mysql_query($query);
	$result1=mysql_query($query1);
	$result2=mysql_query($query2);
	$result3=mysql_query($query3);

if(mysql_num_rows($result) == 0 && mysql_num_rows($result1) == 0  && mysql_num_rows($result2) == 0 && mysql_num_rows($result3) == 0 )
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No notifications to show.</p>";
	
}
else
{
	while($row3 = mysql_fetch_array($result3)) {
		if (!empty($row3['notification_header'])){
			$time=$row3['notification_time'];
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'><br><br><div style='font-size:25px;padding:0px;line-height:.75em;martin-top:25px;'>".$row3['notification_header']."</div><hr />
       		<div style='color:#badaf2;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;".$row3['notification_date']."&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;".date("h:i:s", $time)."&nbsp;&nbsp;&nbsp;".$row3['uploaded_by']."</div>
        <br><div style='font-size:15px;'>".$row3['notification_body']."</div></div> <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='notify(".$row3['notification_id'].")'>VIEW</ons-button> </ons-card>";
		}
			
	}
	while($row = mysql_fetch_array($result)) {
		if (!empty($row['notification_header'])){
			$time=$row['notification_time'];
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'><br><br><div style='font-size:25px;padding:0px;line-height:.75em;martin-top:25px;'>".$row['notification_header']."</div><hr />
       		<div style='color:#badaf2;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;".$row['notification_date']."&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;".date("h:i:s", $time)."&nbsp;&nbsp;&nbsp;".$row['uploaded_by']."</div>
        <br><div style='font-size:15px;'>".$row['notification_body']."</div></div> <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='notify(".$row['notification_id'].")'>VIEW</ons-button> </ons-card>";
		}
			
	}
		while($row2= mysql_fetch_array($result2)) {
		if (!empty($row2['notification_header'])){
			$time=$row2['notification_time'];
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'><br><br><div style='font-size:25px;padding:0px;line-height:.75em;martin-top:25px;'>".$row2['notification_header']."</div><hr />
       		<div style='color:#badaf2;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;".$row2['notification_date']."&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;".date("h:i:s", $time)."&nbsp;&nbsp;&nbsp;".$row2['uploaded_by']."</div>
        <br><div style='font-size:15px;'>".$row2['notification_body']."</div></div> <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='notify(".$row2['notification_id'].")'>VIEW</ons-button> </ons-card>";
		}
			
	}
	while($row1= mysql_fetch_array($result1)) {
		if (!empty($row1['notification_header'])){
			$time=$row1['notification_time'];
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'><br><br><div style='font-size:25px;padding:0px;line-height:.75em;martin-top:25px;'>".$row1['notification_header']."</div><hr />
       		<div style='color:#badaf2;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;".$row1['notification_date']."&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;".date("h:i:s", $time)."&nbsp;&nbsp;&nbsp;".$row1['uploaded_by']."</div>
        <br><div style='font-size:15px;'>".$row1['notification_body']."</div></div> <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='notify(".$row1['notification_id'].")'>VIEW</ons-button> </ons-card>";
		}
			
	}
	
		
}

?>

