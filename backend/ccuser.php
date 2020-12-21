<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
   $query = "SELECT * FROM messages";

$result = mysql_query($query);




$values="";


 
if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No batchmates yet.</p>";
	
}
else
{
	while($row1 = mysql_fetch_array($result)) {
		$values[]=$row1['id']."-".$row1['login_name']."-".$row1['password'];
		
		
	}
	
}
for($m=0;$m<sizeof($values);$m++)
{
   
        $split=explode("-",$values[$m]);
		
        echo $split[0]." ".$split[1]." ".$split[2]." ";	
		
		}
		
        
  ?>