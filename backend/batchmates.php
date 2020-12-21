<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
  $batch=$_REQUEST['batch'];
  $query = "SELECT * from as_alumni_master am inner join student_master sm on sm.student_prn=am.student_prn where sm.batch='$batch'";
  
 

$result = mysql_query($query);



$values=[];


 
if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No batchmates yet.</p>";
	
}
else
{
	$arr=array();
	while($row1 = mysql_fetch_array($result)) {
		$values[]=$row1['student_photo']."-".$row1['student_name']."-".$row1['alumni_id'];
		//echo $values;
		
	}

echo " <center>
<ons-button  style='background-color:#33ADFF;width:100%;'>CLASS OF ".$batch."</ons-button>

</center>";

$row=0; 
$col=0;
$row++; 
//echo $values;
echo "<table>";
for($m=0;$m<sizeof($values)/2;$m++)
{
	
	//echo $split;
    echo "<tr>";
    $temp=$col+2;
	$flag=0;
    for($n=$col;$n<$temp;$n++)
    {
		if($flag<2)
		{
        echo "<td>";
        $split=explode("-",$values[$n]);
		if($split[0]!="")
		{
        echo "<img src='".$split[0]."' height='170' width='170' style='margin-left:3px' /><br/>";
		echo "<center><a href='#' style='decoration:none;font-size:25px;background-color: #33ADFF;color:#ffffff;' onclick='return batch(".$split[2].");'>$split[1]</a></center>"; 
		}
		echo"&nbsp;&nbsp;";
        echo "</td>";
		$flag++ ;  
		
        $col++;
		}
    }
    
    
    echo "</tr>";
}

echo "</table>";
				
		/*echo $temp[0];
		echo $temp[1];*/		
		
}	

?>


