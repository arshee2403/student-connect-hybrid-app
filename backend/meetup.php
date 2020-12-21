<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $batch=$_REQUEST['batch'];
  $query = "SELECT * from meetup m inner join as_alumni_master am on m.alumni_id=am.alumni_id inner join student_master sm on sm.student_prn=am.student_prn where m.batch='$batch'";

$result = mysql_query($query);

  if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No meetups to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		$time=$row['meetup_time'];
		$date=$row['meetup_date'];
		echo "
  <div style='background-color:#ffffff;border: 2px solid #cdd2d6;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'>
   
      <img style='height: 30px; width: 30px; margin-right: 4px;float: left;border-radius:30px;' src='".$row['student_photo']."'/>&nbsp;&nbsp;<h4 style='float: left;font-size:15px;padding:0px;line-height:.75em;font-weight:bold;' class='Name'>".$row['student_name']."</h4>
      <br/><h4 style='font-size:15px;padding:0px;line-height:.75em;font-weight:50;' id='date'>On 12<sup>th</sup>August,2017</h4>
 
  <hr />
  
  <p id='meetup date' style='color:grey;font-size:20px;padding:0px;line-height:.75em;margin-left:10px;'>Date :&nbsp;".$date."</p><br />
  <p id='meetup location' style='color:grey;font-size:20px;padding:0px;margin-left:10px;'>Venue :&nbsp;".$row['meetup_venue']."</p><br />
 
  <p id='meetup time' style='color:grey;font-size:20px;padding:0px;line-height:.75em;margin-left:10px;'>Time :&nbsp;".date("h:i:s", $time)."</p></div><br />";
	
	}
		
	
	

}



?>
   




  

  