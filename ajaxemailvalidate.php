<?php
include("connection.php");
//include("session_customer.php");
 
		$value=$_REQUEST['value'];
		$id=$_REQUEST['id'];
	
		
		if($id=="vid")
		{
		 $q = "select * from  signup_tbl where email='$value'";
		$res = mysqli_query($conn,$q);
		if(mysqli_num_rows($res)>0)
		{
			?>
		<!-- <button class="btn btn-danger" disabled="true"></button> -->
		<button class="btn btn-danger w-100 py-3" type="submit" disabled="true">email alredy exists</button>

			
		<?php
		}
		else
		{
		?>
		
			 <!-- <input type="submit" class="btn btn-info"  name="signupbtn"> -->
			 <button class="btn btn-primary w-100 py-3" type="submit" name="signupbtn">Sign Up</button>

			
		<?php
		}
		?>
		
<?php
		}
?>
