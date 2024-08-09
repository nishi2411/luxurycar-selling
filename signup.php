<?php 
    include "connection.php";
    // include("session_customer.php");
    if(isset($_REQUEST['signupbtn']))
    {
        $firstname = mysqli_real_escape_string($conn,$_REQUEST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_REQUEST['lastname']);
        $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
        $mobile = mysqli_real_escape_string($conn,$_REQUEST['mobile']);
        $city = mysqli_real_escape_string($conn,$_REQUEST['city']);
        $gender = mysqli_real_escape_string($conn,$_REQUEST['gender']);
        $address = mysqli_real_escape_string($conn,$_REQUEST['address']);
        $password = mysqli_real_escape_string($conn,md5($_REQUEST['password']));
        $cpassword = mysqli_real_escape_string($conn,md5($_REQUEST['cpassword']));

        $filename = $_FILES['image1']['name'];
        $tmp_name = $_FILES['image1']['tmp_name'];
        $folder = "uploads/" . $filename;

        move_uploaded_file($tmp_name, $folder);

          $query = "INSERT INTO signup_tbl VALUES(NULL,'$firstname','$lastname','$email','$mobile','$city','$gender','$address','$password','$cpassword','$filename','','','','pending')";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            echo '<script>alert("successfully inserted")</script>';
        }else
        {
            echo '<script>alert("failed to insert")</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("css.php");?>
    <script src="captcha.js"></script>
</head>

<body onLoad="generate()">
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
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Sign Up</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">sign up</li>
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
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Sign up</h5>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 m-auto mt-5">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="POST" role="form" id="quickForm" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="firstname" class="form-control" id="firstname" name="firstname" placeholder="Firstname"  onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required" required>
                                            <label for="text">Firstname</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-floating">
                                            <input type="lastname" class="form-control" id="lastname" name="lastname" placeholder="Lastname"  onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required" required>
                                            <label for="text">Lastname</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            <label for="email">Email</label>
                                            <div id="" style="color:red;font-weight:bold;"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number"  pattern="[0-9]{10,10}" title="Minimum 10 Digit Required" required>
                                            <label for="text">Mobile Number</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-group">
                                        <?php
                                            $select = "SELECT * FROM city_mst";
                                            $result = mysqli_query($conn,$select);

                                          ?>
                                            <select class="form-control select2 bg-white" style="width: 100%;" name="city" id="city" required>
                                                <option selected="">Select City</option>
                                                <?php while($row = mysqli_fetch_array($result)){ ?>
                                                <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"  required>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" name="address" id="address" required></textarea>
                                            <label for="address">Enter Address</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required >
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                                            <label for="cpassword">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="file" id="image1" name="image1" required>
                                        </div>
                                    </div>
                                    <!-- captcha code -->
                                   <div class="col-12">
                                        <div id="user-input" class="inline"><br>
                                                <input type="text" class="form-control" id="submit" placeholder="Captcha code" required />
                                            </div>
                                            <div class="inline" onClick="generate()">
                                                <i class="fas fa-sync"></i>
                                            </div>
                                            <div id="image" class="inline" selectable="False">
                                            </div>  <div class="col-md-3">            
                                            <p id="key" style="color:red"></p>
                                        </div>
                                   </div>
                                    <!-- captcha end -->
                                        <div class="col-12">
                                            <div id="vid">
                                                <input  class="btn btn-primary w-100 py-3" type="submit" name="signupbtn" onClick="printmsg()">
                                            </div>
                                        </div>
                                    <div class="col-12">
                                        Already have an account?
                                        <a href="sign-in.php" class="text-blue">login</a>
                                    </div>
                                    
                                </div>
                            </form>
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
    <script>
            var password = document.getElementById("password")
            , cpassword = document.getElementById("cpassword");

            function validatePassword(){
            if(password.value != cpassword.value) {
                cpassword.setCustomValidity("Passwords Don't Match");
            } else {
                cpassword.setCustomValidity('');
            }
            }

            password.onchange = validatePassword;
            cpassword.onkeyup = validatePassword;
</script>

<!-- insert validation when data alredy exists -->
<script>
                $(document).ready(function(){
                $('#email').keyup(function(){
                var vid = $('#email').val();
                if(vid != '')
                {
                $.ajax({
                    url:"ajaxemailvalidate.php",
                    method:"GET",
                    data:{value:vid,id:'vid'},
                    success:function(data)
                    {
                   
                        $('#vid').html(data);
                    }
                    
                });
                }
                });
                   });
</script>
 
<!-- jquery form validtion -->
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
        firstname: {
        required: true
      },
      lastname: {
        required: true
      }
    },
    messages: {
        firstname: {
        required: "Please enter firstname"
      },
      lastname: {
        required: "Please enter lastname"
      }
    }
  });
});
</script>

</body>

</html>