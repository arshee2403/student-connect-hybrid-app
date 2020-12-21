<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
$id=$_REQUEST['id'];

$query = "SELECT * from query q inner join student_master sm on sm.student_prn=q.student_prn where sm.student_prn='$id' ;";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No events to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		$d=$row['query_date'];
		$date=strtotime($d);
		echo " <div style='background-color:#ffffff;border: 2px solid #cdd2d6;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'>
   
      <img style='height: 30px; width: 30px; margin-right: 4px;float: left;border-radius:30px;' src='".$row['student_photo']."'/>&nbsp;&nbsp;<h4 style='float: left;font-size:15px;padding:0px;line-height:.75em;font-weight:bold;' class='Name'>".$row['student_name']."</h4>
      <br/>
 
  <hr />
  <p  id='company name' style='color:grey;font-size:15x;padding:0px'>".$row['query_about']."</p>
   <br><hr /> <p   style='font-size:20px;padding:0px;line-height:.75em;text-align: center;font-weight:bold; '>Replies</p><hr />
  
 <p  id='company name' style='color:grey;font-size:15x;padding:0px'>".$row['query_details']."</p>
         
   
  </div>
</div>
  </div>";
	}
		
	
	

}



?>
   















