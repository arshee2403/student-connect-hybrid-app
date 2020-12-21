<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  
  $query = "SELECT * from faculty;";

$result = mysql_query($query);
 if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No meetups to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo " <div id='event' style='width:95%;height:100px;background-color:#ffffff;border: 1px solid #33adff;padding:15px 10px 15px 10px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;' >
      
<div style='display:inline-block;float:left;'>
        <img src='person.jpg' style=' height:50px;width:50px; '/></div>
        <div  style='margin-left:20px;float:left;display:inline-block;border-left: 2px solid #33ADFF;height: 70px;'></div>
         <div style='margin-left:30px;float:left;display:inline-block;'>
        <h5>
  <b>".$row['faculty_name']."</b>
  <br />
  <p>".$row['faculty_designation']."<br />
  ".$row['faculty_qualification']."</p></h5></div>
     </div>";
		
		
		
		
		}
		
	
	

}

?>


