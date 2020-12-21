<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");


$query = "select * from events order by event_id desc LIMIT 5";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No achievements to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<ons-card style='padding-top:2px;padding-bottom:20px;'> ";
	
		echo "<div style='float:left;margin-top:20px;padding:0px;line-height:0px;'><span  style='margin-left:90%;'>
        <b><p style='font-size:20px;'>".$row[event_name]."</p></b>
</span>
</div>  <div style='float:left;margin-top:0px;margin-left:0px;'>
<img src='".$row[event_photos]."' style='margin-top:10px;float:left; height:150px;width:100%; '/></div> 
       <br> <p style=font-size:15px;'>".$row[event_details]."</p>
      <br />
</ons-card><br>";
	}
		
}

?>


         
         
