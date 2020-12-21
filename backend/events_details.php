 <?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
$e_id=$_REQUEST['e_id'];


$query = "select * from events where event_id=$e_id";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No details to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<div id='event' style='background-color:#ffffff;border: 1px solid #33adff;padding:15px 10px 80px 10px;margin-left:10px;margin-right:10px;margin-top:10px;' >
  <img src='".$row[event_photos]."' style='width:100%' alt='' />
<div style='color:#ffffff;background-color:#33adff;text-align:center;padding:5px 30px 5px 30px; '>  <h3 >".$row[event_name]."</h3></div>
  <h5 style='color:#8bd1ef;'>Event description<br /><img src='clock .png'>&nbsp;DATE:".$row[event_date]."<br />&nbsp;&nbsp;&nbsp;
     TIME: ".$row[event_time]."<br />
      <img src='locataion.jpg' height='20px' width='20px'>&nbsp;&nbsp;".$row[event_venue]."</h5>
    
      <video width='150' height='150' poster='/images/w3html5.gif' controls>
   <source src='movie.mp4' type='video/mp4'>
   <source src='movie.ogg' type='video/ogg'>
   Your browser does not support the video tag.
</video> <video width='150' height='150' poster='/images/w3html5.gif' controls>
   <source src='movie.mp4' type='video/mp4'>
   <source src='movie.ogg' type='video/ogg'>
   Your browser does not support the video tag.
</video>

      
  </h5>
  
 
      
    
  </p>
  
  </div>";
	}
}
?>