<?php 
    include ("connection.php");
    if(isset($_REQUEST['submitbtn']))
    {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,md5($_POST['password']));

        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn,$query);

        $query1 = "SELECT * FROM signup_tbl WHERE email = '$email' AND password = '$password'";
        $result1 = mysqli_query($conn,$query1);
        // $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['admin'] = $email;
            // $_SESSION['password'] = $row['password'];
            // header("location:adminlte/index.php");
            echo '<script>alert("Login successfull")</script>';
            echo "<script>window.location='adminlte/index.php'</script>";
        }
        else if(mysqli_num_rows($result1)>0)
        {
            $_SESSION['customer'] = $email;
            // $_SESSION['password'] = $row['password'];
            // header("location:customer_home.php");
            echo '<script>alert("Login successfull")</script>';
            echo "<script>window.location='customer_home.php'</script>";

        }
        else
        {
            echo '<script>alert("Invalid Email Id & Password")</script>';
            echo "<script>window.location='sign-in.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("css.php");?>
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
                            <li class="breadcrumb-item text-white active" aria-current="page">sign-in</li>
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
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Sign in</h5>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 m-auto mt-5">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" Required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" Required>
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="submitbtn">Sign In</button>
                                    </div>
                                    <div class="col-12">
                                        Not a member?
                                        <a href="signup.php" class="text-blue">Signup Now</a>
										<a href="forgetpass.php" class="" style="float:right; color:green">** Forget Password</a>
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
</body>

</html>