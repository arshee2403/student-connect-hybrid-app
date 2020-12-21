<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
    $id=$_REQUEST['id'];
  $query = "SELECT * from as_alumni_master am inner join student_master sm on sm.student_prn=am.student_prn where am.alumni_id='$id'";

$result = mysql_query($query);

  if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No meetups to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<div style='background-color:#ffffff;border: 2px solid #cdd2d6;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'><br /><br/>
    <img style='height: 30px; width: 30px; margin-right: 4px;float: left;border-radius:30px;' src='".$row['student_photo']."'/>&nbsp;&nbsp;<h4 style='float: left;font-size:15px;padding:0px;line-height:.75em;font-weight:bold;' class='Name'>".$row['student_name']."</h4>
      <br/>
  <br/>
  <hr />
  <br/>
   <div style='font-size:20px;text-align:center;background-color: #33ADFF;color:#ffffff;padding-top:10px;padding-bottom:10px;'>Current working Status</div><br><p style='text-align:center;font-size:15px'>".$row['alumni_degree']."</p><br>
     <div style='font-size:20px;text-align:center;background-color: #33ADFF;color:#ffffff;padding-top:10px;padding-bottom:10px;'>Qualification</div><br><p style='text-align:center;font-size:15px'>".$row['alumni_qualification']."</p><br>
       <div style='font-size:20px;text-align:center;background-color: #33ADFF;color:#ffffff;padding-top:10px;padding-bottom:10px;'>Work experience</div><br><p style='text-align:center;font-size:15px'>".$row['alumni_workexperience']."</p><br>></div>";
		
		}
		
	
	

}



?>