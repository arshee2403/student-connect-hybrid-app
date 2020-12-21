<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");


$query = "select event_name, event_details, event_venue, event_date,event_time,event_photos from events order by event_id desc";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No events to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'>";
		if (!empty($row['event_name'])){
		echo "<img src='".$row['event_photos']."' style='width:200px;padding-top:20px;'>";
		}
			echo "<div class='title'> ".$row['event_name']."</div>
		     <div class='content'>".$row['event_details']."</div> </ons-card>";
			/*echo "<div id='date' style='width: 80px;height: 90px;background-color:#ffffff;border: 1px solid #33adff;color:#064f87;float:left;display: inline-block;text-align:center;border-radius:10px;padding:5px 5px 5px 5px;>
        <h3><b>".$row['event_date']."
<sup>th</sup></b><br /></h3></div>
         <div style='margin-top:0px;margin-left:100px;'>
            <p style='color:#bad0e0;font-size:10px;margin-top:0px;padding:0px;line-height:0px;'> <img src='clock .png'>&nbsp;Date&nbsp;&nbsp;&nbsp;<img src='calendar.png'>&nbsp;Time&nbsp;&nbsp;&nbsp;Uploaded By</p>
           
         <p style='font-size:25px;padding:0px;'>".$row['event_title']."</p>   <p style='font-size:15px;'>".$row['event_details']."</p>
        <ons-button id='push-button' style='left:100px;width:50%;' onclick='fn.load('eventdescriptions.html')'>VIEW</ons-button>  <br />
       
         </div> */
	}
		
	
	

}



?>
   