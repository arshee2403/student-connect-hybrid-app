<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");


$query = "SELECT * from student_master sm inner join as_alumni_master am on sm.student_prn=am.student_prn inner join opportunities o on am.alumni_id=o.alumni_id;";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No events to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<div style='background-color:#ffffff;border: 2px solid #cdd2d6;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'>
   
      <img style='height: 30px; width: 30px; margin-right: 4px;float: left;border-radius:30px;' src='".$row['student_photo']."'/>&nbsp;&nbsp;<h4 style='float: left;font-size:15px;padding:0px;line-height:.75em;font-weight:bold;' class='Name'>".$row['student_name']."</h4>
      <br/>
 
  <hr />
  <p   style='font-size:20px;padding:0px;line-height:.75em;text-align: center;font-weight:bold; '>".$row['job_title']."</p><hr />
   <p  style='color:grey;font-size:20px;padding:0px;line-height:.75em;margin-left:10px;'>Company name:&nbsp;".$row['company_name']."</p><br />

  <p id='location' style='color:grey;font-size:20px;padding:0px;margin-left:10px;'>Location :&nbsp;".$row['location']."</p><br />
  <p id='salary'style='color:grey;font-size:20px;padding:0px;line-height:.75em;margin-left:10px;'>Salary :&nbsp;".$row['salary']."</p><br />
  <p id='deadline' style='color:grey;font-size:20px;padding:0px;line-height:.75em;margin-left:10px;'>Deadline :&nbsp;".$row['deadline']."</p><br />
  <ons-button style='background-color: #33ADFF;width:30%;padding:5px;font-size:15px;margin-left:210px;' onclick='opportunity(".$row['opportunities_id'].")'>VIEW</ons-button></div>";
	}
		
	
	

}



?>
   















