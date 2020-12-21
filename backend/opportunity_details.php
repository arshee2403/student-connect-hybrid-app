<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
$o_id=$_REQUEST['o_id'];


$query = "SELECT * from  opportunities where opportunities_id=$o_id";

$result = mysql_query($query);

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No details to show.</p>";
	
}
else
{
	while($row = mysql_fetch_array($result)) {
		
		echo "<div style='text-align:center;font-size:20px;background-color: #33ADFF;color:#ffffff;padding-top:15px;padding-bottom:15px;'> Description</div>
  <div style='background-color:#ffffff;padding:15px 10px 500px 20px;margin-left:10px;margin-right:10px;margin-top:10px;box-shadow:3px 3px 3px 3px grey;'> 
 <p id='description' style='color:grey;font-size:20px;padding:0px;margin-left:10px;'>".$row['other_details']."
</p>Contact: <p  style='color:grey;font-size:20px;padding:0px;margin-left:10px;'>".$row['contact']."</p>
  <hr />
  <ons-icon  icon'fa-share-alt' size='25px' style='float:left;color:#33ADFF;'></ons-icon>&nbsp;&nbsp;<p style='float:left;color:black;font-size:20px;padding:0px;margin-left:10px;color:#33ADFF;'>Share</p><br />
  <br/>
  <br /> <p  style='color:grey;font-size:20px;padding:0px;'>
    Let your friends and batchmates know about this</p><br />
   <ul class='social-icons'>
    <li><a href='http://www.facebook.com'><img src='facebook.jpg' /></a></li>
    <li><a href='http://www.whatsapp.com'><img src='whatsapp.png' /></a></li>
 <li><a href='http://www.whatsapp.com'><img src='share.png' style='border-radius:200px;' /></a></li></ul>
 <br />
 <hr />

<ons-icon  icon='fa-envelope' size='25px' style='float:left;color:#33ADFF;' ></ons-icon>&nbsp;&nbsp;<p style='float:left;color:black;font-size:20px;padding:0px;margin-left:10px;color:#33ADFF;'>Contact</p><br />
<br />
  <p style='color:grey;font-size:20px;padding:0px;'>
   Want to get in touch send a direct message</p><br />
   <ons-button onclick='showdm()'>Direct Message</ons-button>
  
   <hr/>
   <p style='float:left;color:black;font-size:20px;padding:0px;margin-left:10px;color:#33ADFF;'>Links to apply</p>
</div>";
	}
		
	
	

}



?>
   















