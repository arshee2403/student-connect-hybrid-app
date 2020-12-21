<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
$n_id=$_REQUEST['n_id'];


$query = "SELECT * from  notification where notification_id=$n_id";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No details to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<div style='text-align:center;font-size:20px;background-color: #33ADFF;color:#ffffff;padding-top:15px;padding-bottom:15px;'> Details</div>
  <div style='background-color:#ffffff;padding:15px 10px 500px 20px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'> 
  <p id='description' style='color:grey;font-size:20px;padding:0px;margin-left:10px;'>".$row['notification_body']."
</p>
  ";
  		if (!empty($row['other_uploads'])){
		echo "	 <a href='#' style='background-color: #33ADFF; color: white;padding-top:5px;padding-bottom:5px;padding-left:5px;padding-right:5px;text-align: center;text-decoration: none;display: inline-block;font-size:20px;' onclick=\"loadPDF('".$row['other_uploads']."')\">Open PDF</a></div>";
		}
	}
		
	
	

}



?>
   















