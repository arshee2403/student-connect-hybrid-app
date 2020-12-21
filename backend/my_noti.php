<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  

$user=$_REQUEST['user'];
 
	  $query ="select * from notification where  notification_valid_till_date is not null and notification_valid_till_date>CURRENT_TIMESTAMP and uploaded_by like '%$user%'";
	  
	$result = mysql_query($query);
	

if(mysql_num_rows($result) == 0 )
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No notifications added by you.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		if (!empty($row['notification_header'])){
			$time=$row['notification_time'];
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'><br><br><div style='font-size:25px;padding:0px;line-height:.75em;martin-top:25px;'>".$row['notification_header']."</div> &nbsp;<ons-button style='background-color: #33ADFF;width:50px;margin-left:250px;' onclick='delete_noti(".$row['notification_id'].")'><ons-icon icon='fa-trash-alt'></ons-icon></ons-button><hr />
       		<div style='color:#badaf2;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;".$row['notification_date']."&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;".date("h:i:s", $time)."&nbsp;&nbsp;&nbsp;".$row['uploaded_by']."</div>
        <br><div style='font-size:15px;'>".$row['notification_body']."</div></div> <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='notify(".$row['notification_id'].")'>VIEW</ons-button> </ons-card>";
		}
			
	}
		
			
	}
	
		


?>

