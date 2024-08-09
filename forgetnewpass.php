<?php

 include("connection.php");
 if(isset($_SESSION['forgot']))
{
	
	$email = $_SESSION['forgot'];
	//$cno = $_SESSION['contact'];
	$otp = $_SESSION['otp'];

}
else
{
	header("location:login");
}

if(isset($_REQUEST['btn_update']))
{
	$email = $_SESSION['forgot'];
	
	$pwd = md5($_POST['txtpwd']);
	//mysqli_real_escape_string($conn,md5($_POST['password']));

	
	$update ="update signup_tbl set password='$pwd' where email='$email'";
	mysqli_query($conn,$update); 
	
	
	unset($_SESSION['forgot']);
	unset($_SESSION['contact']);
	unset($_SESSION['otp']);
	echo '<script>alert("Password change successfully")</script>';
        echo "<script>window.location='sign-in.php'</script>";
	// header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("css.php");?>
	<script type="text/javascript">
  function checkForm() 
  {
  	//alert("submit");
	// Fetching values from all input fields and storing them in variables.
	var email = document.getElementById("email1").value;
	
	
	/*var password = document.getElementById("password1").value;
	var email = document.getElementById("email1").value;
	var website = document.getElementById("website1").value;*/
	//Check input Fields Should not be blanks.
	alert("Fill All Fields");
	if (email == '') 
	{
		alert("Fill All Fields");
		return false;//
	} 
	else 
	{
		//Notifying error fields
		var email1 = document.getElementById("email");
		
		if (email1.innerHTML == 'Required'|| email1.innerHTML == 'Invalid Email') 
		{
			alert("Fill Valid Information");
			return false;
		} 
		else 
		{
			//Submit Form When All values are valid.
			document.getElementById("myForm").submit();
		}
	}
}
// AJAX code to check input field values when onblur event triggerd.
function validation(field, query) 
{
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{ 
		// for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{ 
		// for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = "Validating..";
		} 
		else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = xmlhttp.responseText;
		} 
		else 
		{
			document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "validation.php?field=" + field + "&query=" + query, false);
	xmlhttp.send();
}
  </script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
        <?php include("menubar.php"); ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Sign in</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">New Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">New password</h5>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 m-auto mt-5">
					
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                             <center>
							<form class="login-form" id="myForm" name="myForm" method="post">
						<div class="card mb-0">
							<div class="card-body">

	
		<div class="form-group">
		<div class="col-lg-6">
		<!-- <label for="exampleInputEmail1">New Password</label> -->
		<input id="email1" class="form-control" style="width:210px" type="password" name="txtpwd" placeholder="Enter New password"  pattern="[A-Za-z0-9@]{7,}" required>
		</div>
		<div id="pass" style="color:#FF0000;font-size:12px;margin-top:-15px;" class="col-lg-6"></div>
		
</div>
			
		
		<div id="payment">
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="review_submit" type="submit" name="btn_update" class="btn btn-success" value="Submit">Submit</button>
		</div>
					</div>
						</div>
					</form>
		
                    </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


       <!-- Footer Start -->
       <?php include ("footer.php"); ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>