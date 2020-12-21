<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
    $course=$_REQUEST['course'];
  $query = "SELECT * from course where course_name='$course'";

$result = mysql_query($query);
$row = mysql_fetch_array($result);
$course_id=$row['course_id'];

 $query2 = "SELECT * FROM course c inner join batch b where c.course_id=b.c_b_id and c.course_id='$course_id'";
 $result2 = mysql_query($query2);
  if(mysql_num_rows($result) == 0)
{
echo '<option value="">Empty</option>';
	
}
else
{
	echo '<option value="">Please select...</option>';
	
	while($row2= mysql_fetch_array($result2)) {
		 echo '<option value="'.$row2['batch_name'].'">' . $row2['batch_name'] . "</option>";
		}
		
	
	

}



?>