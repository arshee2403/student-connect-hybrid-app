<?php
header("Access-Control-Allow-Origin: *");

 mysql_connect("162.222.225.87:3306","projectadmin","Password@123");
  mysql_select_db("ProjectsDB");
	
	$user_type=$_REQUEST['user_type']; 
	$parent_id=$_REQUEST['parentid'];
	$student_prn=$_REQUEST['studentprn'];
  
	if($user_type=="Student")
	{
	  $query = "SELECT * FROM payment_details where student_prn='$student_prn' ";
	  $result = mysql_query($query);
	}
	else if($user_type=="Parent")
	{
	$query1="SELECT * FROM parent_student_mapping where parent_id=$parent_id"; 
	$result1 = mysql_query($query1);
  
	if(mysql_num_rows($result1) == 1)
	{
	$row1 = mysql_fetch_array($result1);
	$student_id=$row1['student_prn'];

	$query = "SELECT * FROM payment_details where student_prn='$student_id' ";

	$result = mysql_query($query);
	}
	else
	{
		echo "Error";
	}
	}

if(mysql_num_rows($result) == 0)
{

echo "<p style='text-align: center; opacity: 0.6; padding-top: 20px;'>No payments to show.</p>";
	
}
else
{
	$url='https://checkout.razorpay.com/v1/checkout.js';
	while($row = mysql_fetch_array($result))
		{
			if($row['status']=='new')
			{
		 echo "<div style='background-color:#ffffff;border: 1px solid #33adff;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;'>
<span class='label label-danger'>NEW</span>
<p style='font-size:25px;padding:0px;line-height:.75em;text-align: center; '>".$row['transaction']."</p><br>
<p style='font-size:15px;padding:0px;line-height:.75em;'>Total Fees :".$row['amount']."</p><hr />
<p style='font-size:15px;padding:0px;line-height:.75em;'>Balance Fees :".$row['balance']."</p><hr />
<center><ons-button style='background-color: #33ADFF;width:40%;padding:10px;font-size:20px;' onclick='payment(".$row['balance'].")'>Pay Fees</ons-button></center>
  <form  method='POST'>
            <script
    src=".$url."
    data-key='rzp_test_ropZhIy62foyDu'
    data-amount='5000'
    data-buttontext='Pay with Razorpay'
    data-name='Merchant Name
    data-description='Purchase Description'
    data-image='https://your-awesome-site.com/your_logo.jpg'
    data-prefill.name='Gaurav Kumar'
    data-prefill.email='test@test.com'
    data-theme.color='#F37254'
></script>
<input type='button'  name='hidden'></form>
     </div>";
	}
		elseif($row['status']=='pending')
			{
		 echo "<div style='background-color:#ffffff;border: 1px solid #33adff;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;'>
<span class='label label-danger'>PENDING</span>
<p style='font-size:25px;padding:0px;line-height:.75em;text-align: center; '>".$row['transaction']."</p><br>
<p style='font-size:15px;padding:0px;line-height:.75em;'>Total Fees :".$row['amount']."</p><hr />
<p style='font-size:15px;padding:0px;line-height:.75em;'>Balance Fees :".$row['balance']."</p><hr />
<center><ons-button style='background-color: #33ADFF;width:40%;padding:10px;font-size:20px;' onclick='payment(".$row['balance'].")'>Pay Fees</ons-button></center>
     </div>";
	}
		elseif($row['status']=='payed')
			{
		 echo "<div id='Payment-history' style='background-color:#ffffff;border: 1px solid #33adff;padding:15px 10px 70px 10px;margin-left:10px;margin-right:10px;margin-top:10px;'>
          <div style='text-align:center;font-size:20px;background-color: #33ADFF;color:#ffffff;padding-top:20px;padding-bottom:20px;'>Payment History</div> <span class='label label-danger'>Payed</span>
<p style='font-size:25px;padding:0px;line-height:.75em;text-align: center; '>".$row['transaction']."</p>
<p style='font-size:15px;padding:0px;line-height:.75em;'>Date :".$row['transaction_datetime']."</p><hr />
<p style='font-size:15px;padding:0px;line-height:.75em;'>Receipt no :".$row['payment_details']."</p><hr />
<p style='font-size:15px;padding:0px;line-height:.75em;'>Amount :".$row['amount']."</p><hr />
<p style='font-size:15px;padding:0px;line-height:.75em;'>Payment Type :".$row['transaction_type']."</p><hr />
<center>

     </div> ";
	}
}
}



		?>