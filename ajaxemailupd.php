<?php
include("connection.php");
 include("session_customer.php");
 
		$value=$_REQUEST['value'];
		$id=$_REQUEST['id'];
	
		
		if($id=="vid")
		{
		 $q = "select * from  signup_tbl where email='$value'";
		$res = mysqli_query($conn,$q);
		if(mysqli_num_rows($res)>0)
		{
			echo false;
		}else
		{
			echo true;
		}
			
		}
?>