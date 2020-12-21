<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");

$achievement_type=$_REQUEST[achievement_type];
$query = "SELECT * FROM as_achievement ac inner join student_master sm where ac.student_prn=sm.student_prn and achievement_type='$achievement_type'order by achievement_id desc";

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
        <b><p style='font-size:20px;padding:0px;'>".$row[achievement_title]."</p></b>
</span></div> <div style='float:left;margin-top:0px;margin-left:0px;'>
        <div id='pic' style='width: 80px;height: 60px;'>
        <img src='".$row[student_photo]."' style='margin-top:10px;float:left; height:100px;width:100px; '/></div> 
        <p style=font-size:15px;'>".$row[achievement_details]."</p></div>
        <br />
         
        
         
        
         </div>

        </ons-card>";
		
		
	}
		
}

?>


         
         
