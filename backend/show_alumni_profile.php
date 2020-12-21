<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $id=$_REQUEST['id'];
  $query = "SELECT * from as_alumni_master am inner join student_master sm on sm.student_prn=am.student_prn where am.alumni_id='$id'";

$result = mysql_query($query);

	$row = mysql_fetch_array($result);
		
echo "<br><div style='background-color:#ffffff;border: 2px solid #cdd2d6;padding:15px 10px 40px 10px;margin-left:10px;margin-right:10px;margin-top:0px;box-shadow:3px 3px 3px 3px grey;'>
   <div style='text-align:center;font-size:20px;background-color: #33ADFF;color:#ffffff;padding-top:20px;padding-bottom:20px;'>Add Other Details</div>
    <br>
     <div  style='text-align:center;background-color: #33ADFF;color:#ffffff;'>Enter Your Current working Status</div><br><input id='current_status' class='form-control' type='text' value=".$row['alumni_degree']."><br><br>
     <div style='text-align:center;background-color: #33ADFF;color:#ffffff;'>Enter Your Qualification</div><br><input id='qualification'  class='form-control' type='text' value=".$row['alumni_qualification']."><br>
     <div style='text-align:center;background-color: #33ADFF;color:#ffffff;'>Enter Your Work Experience</div><br><input id='work_experience'  class='form-control' type='text' value=".$row['alumni_workexperience']."><br><br>
     <ons-button id='insertDetails' style='text-align:center;background-color:#33ADFF;width:30%;margin-left:180px;' onclick='update_detail()' >NEXT</ons-button></div>
</div>";

	




?>
   




  

  